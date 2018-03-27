@extends('layouts.app')

@section('title', 'Manajemen Data Pengajuan Eform')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Data Pengajuan Eform</h1>
	<p>Kelola Data anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li class="active">Pengajuan</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-project bottom10">
					<a class="btn btn-primary" href="{!! route('eform.eform-agen') !!}" role="button">
						<i class="fa fa-plus"></i>  Tambah Pengajuan Baru
					</a>
				</div>
                 <div class="table-responsive">
                    <table class="table table-striped table-bordered project-list" id="datatable">
                        <thead class="bg-blue">

                            <tr>
                                    <th>Ref Number</th>
                                    <th>Nama pemohon</th>
                                    <th>Nominal</th>
                                    <th>Developer</th>
                                    <th>Property</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('styles')
	{!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/js/select2.min.js') !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script('js/dropdown.min.js') !!}


    <!-- @todo waiting to move this script to resource/asset/js/property.js -->
        <script type="text/javascript">
        var table = $('#datatable').dataTable({
            processing : true,
            serverSide : true,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                data : function(d, settings){

                    var api = new $.fn.dataTable.Api(settings);
                    console.log(api);
                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            aoColumns : [
                { data: 'ref_number', name: 'ref_number' },
                { data: 'nama_pemohon', name: 'nama_pemohon' },
                { data: 'nominal', name: 'nominal' },
                { data: 'developer_name', name: 'developer_name' },
                { data: 'property_name', name: 'property_name' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });
    </script>
    <script type="text/javascript">
        $('#btn-filter').on('click', function () {
        	table.fnDraw();
        });

        // Init dropdown.js
        $('.ref_number').dropdown('ref_number');
        $('.nik').select2({
            maximumInputLength : 25,
            witdh : '100%',
            allowClear: true,
            ajax : {
                url:'{{ route("eform.get-list-ustomer") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        nik: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    $('.select2-search__field').attr('maxlength', 16);
                    $(".select2-search__field").keydown(function (e) {
                        // Allow: backspace, delete, tab, escape, enter and .
                        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                             // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                             // Allow: Ctrl+C
                            (e.keyCode == 67 && e.ctrlKey === true) ||
                             // Allow: Ctrl+X
                            (e.keyCode == 88 && e.ctrlKey === true) ||
                            // Allow: backspace
                            (e.keyCode === 320 && e.ctrlKey === true) ||
                             // Allow: home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                                 // let it happen, don't do anything
                                 return;
                        }
                        // Ensure that it is a number and stop the keypress
                          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                        }
                    });
                    if( (data.customers.data.length) == 0 ){
                        return {
                            results: '',
                        };

                    } else {
                        params.page = params.page || 1;
                        return {
                            results: data.customers.data,
                            pagination: {
                                more: (params.page * data.customers.per_page) < data.customers.total
                            }
                        };
                    }

                    var text = $(this).find("option:selected").text();

                        console.log(text);
                },
                cache: true
            }
        });
    </script>
@endpush