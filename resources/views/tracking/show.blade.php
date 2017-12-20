@extends('layouts.app')

@section('title', 'Halaman Utama')
@section('breadcrumb')
    <h1 class="text-uppercase">Detail Tracking</h1>
    <ol class="breadcrumb text-center">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Tracking Detail</li>
    </ol>
@endsection
@section('content')
<section id="property" class="padding listing1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-page">
                    <div class="content">
                        <div class="container">
                            <div class="row table-scroll">

                                <div class="tracking-widget cms-tracking-widget">
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results['status'] == 'Pengajuan Kredit') ? 'active' : ''}}">
                                            <div class="bg-icon">
                                                <!-- <div class="icon_pengajuan"></div> -->
                                                {!! Html::image('assets/images/fa_envelope_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!-- <i class="fa fa-envelope"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Pengajuan Telah Diterima</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{( $results['status'] == 'Proses CLF' && $results['status'] == 'Prakarsa' && $results['status'] == 'Disposisi Pengajuan') ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                {!! Html::image('assets/images/fa_analis_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!-- <i class="fa fa-crosshairs"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Proses Analisa Pengajuan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results['status'] == 'Kredit Ditolak') ? 'active' : ''}}">
                                            <div class="bg-icon">
                                                {!! Html::image('assets/images/fa_file_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!--  <i class="fa fa-hdd-o"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Status Pengajuan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three ">
                                            <div class="bg-icon">
                                                {!! Html::image('assets/images/fa_dollar_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!--  <i class="fa fa-dollar"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Proses Pencairan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box w-80">
                                        <h4 class="m-t-0 m-b-30 header-title"><b>Detail Informasi</b></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Ref :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['ref_number'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Pengajuan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['created_at'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lama Pengajuan :</label>
                                                        <div class="col-md-8">
                                                            <input type="hidden" id="createdEform" name="createdEform" value="{{ @$results['created_at'] }}">
                                                            <p class="form-control-static agingVal"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis KPR :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['product_type'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Developer :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['developer_name'] }}</p>
                                                        </div>
                                                    </div>

                                                    @if ( !$results['kpr']['kpr_type_property'] )
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Nama Proyek :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['property_name'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Tipe Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['property_type_name'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Unit Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['property_item_name'] }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Jenis Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['kpr_type_property_name'] }}</p>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Harga Rumah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{ number_format(@$results['kpr']['price'], 2, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Luas Bangunan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['building_area'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lokasi Rumah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['home_location'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jangka Waktu (Bulan) :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['year'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">KPR Aktif :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['active_kpr'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Uang Muka :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{number_format(@$results['kpr']['down_payment'], 2, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{number_format(@$results['kpr']['request_amount'], 2, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama AO :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['ao_name'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['branch'] }}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    <script type="text/javascript">
    $( document ).ready(function() {
        var dob = new Date($("input[name='createdEform']").val());
        var today = new Date();
        var age = Math.floor((today-dob) / (1000 * 60 * 60 * 24));
        $('.agingVal').html(age+' Hari');
    });
    </script>
@endpush