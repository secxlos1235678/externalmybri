<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Developer\PropertyTypeController;
use App\Http\Requests\Developer\Property\CreateRequest;
use App\Http\Requests\Developer\Property\UpdateRequest;
use Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Avaliable columns property datatables
     *
     * @var array
     */
    protected $columns = [
        'prop_name',
        'prop_city_name',
        'prop_types',
        'prop_items',
        'prop_pic_name',
        'prop_pic_phone',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) return $this->datatables($request);

        return view( 'developer.property.index' );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'developer.property.create' );
    }

    /**
     * [store description]
     *
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        return $this->storeOrUpdate($request, 'property', 'post');
    }

    /**
     * Show detail of property
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        if ( $request->ajax() ) {
            return app(PropertyTypeController::class)->datatables($request, $slug);
        }

        return $this->property($slug, 'show');
    }

    /**
     * Show detail of property
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return $this->property($slug, 'edit');
    }

    /**
     * Show detail of property
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $slug)
    {
        return $this->storeOrUpdate($request, "property/{$slug}", 'put');
    }

    /**
     * Initial for datatable property / project
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatables(Request $request)
    {
        $sort = $request->input('order.0');
        $properties = Client::setEndpoint('property')
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])
            ->setQuery([
                'prop_city_id' => $request->input('city'),
                'name'  => $request->input('name_proyek'),
                'pic'   => $request->input('agent'),
                'types' => $request->input('types'),
                'items' => $request->input('items'),
                'sort'  => $this->columns[$sort['column']] .'|'. $sort['dir'],
                'search'=> $request->input('search.value'),
            ])
            ->get();

        foreach ($properties['contents']['data'] as $key => $property) {
            $property['action'] = view('layouts.actions', [
                'show' => route('developer.proyek.show', $property['prop_slug']),
                'edit' => route('developer.proyek.edit', $property['prop_slug'])
            ])->render();
            $properties['contents']['data'][$key] = $property;
        }

        $properties['contents']['draw'] = $request->input('draw');
        $properties['contents']['recordsTotal'] = $properties['contents']['total'];
        $properties['contents']['recordsFiltered'] = $properties['contents']['total'];

        unset(
            $properties['contents']['path'],
            $properties['contents']['prev_page_url'],
            $properties['contents']['next_page_url']
        );

        return response()->json($properties['contents']);
    }

    /**
     * Get property from API
     *
     * @param  string $slug
     * @param  string $view
     * @return \Illuminate\Http\Response
     */
    public function property($slug, $view)
    {
        $property = Client::setEndpoint("property/{$slug}")
            ->setHeaders([
                'Authorization' => session('authenticate.token')
            ])->get();

        return view("developer.property.{$view}", [
            'property' => (object) $property['contents'],
            'role' => 'developer'
        ]);
    }

    /**
     * Handling for create and update property
     *
     * @param  Request $request
     * @param  string  $endpoint
     * @param  string  $method
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request, $endpoint, $method)
    {
        try {
            $response = Client::setEndpoint($endpoint)
                    ->setHeaders(['Authorization' => session('authenticate.token')])
                    ->setBody(array_to_multipart($request->all()))
                    ->{$method}('multipart');

            if ( ! in_array($response['code'], [200, 201]) ) {
                throw new \Exception(json_encode($response['contents']), $response['code']);
            }
            
        } catch (\Exception $e) {
            $message = is_json($e->getMessage()) ? json_decode($e->getMessage()) : $e->getMessage();
            return redirect()->back()->withInput()->withErrors($message);
        }

        return redirect()->route('developer.proyek.index');
    }
}
