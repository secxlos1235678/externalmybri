@extends('layouts.app')

@section('title', 'Ubah Proyek')

@section('breadcrumb')
    <h1 class="text-uppercase">Ubah Proyek</h1>
    <p>Kelola proyek anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek.index') !!}">List Proyek</a></li>
        <li class="active">Ubah Proyek</li>
    </ol>
@endsection

@section( 'content' )
    <div class="card-box">
        @if ( $errors->any() )
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <section id="property" class="padding listing1">
        <div class="container">
            {!! Form::model($property, [
                'route' => ['developer.proyek.update', $property->slug],
                'class' => 'callus submit_property', 'id' => 'form-property',
                'enctype' => 'multipart/form-data', 'method' => 'PUT'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Ubah Proyek Properti</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Proyek</h3>
                            </div>
                            <div class="panel-body">
                                @include( 'developer.property._form', [ 'property' => $property ] )
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20">
                                <i class="mdi mdi-content-save"></i> Ubah
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
