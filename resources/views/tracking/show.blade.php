@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="property" class="padding listing1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-page">
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="tracking-widget cms-tracking-widget">
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results->status == 0) ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Pengajuan Kredit</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results->status == 1) ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                <i class="fa fa-crosshairs"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Disposisi Pengajuan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results->status == 2) ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                <i class="fa fa-hdd-o"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Prakarsa</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results->status == 3) ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                <i class="fa fa-suitcase"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Proses CLF</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results->status == 4) ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Kredit Disetujui</p>
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
                                                            <p class="form-control-static">{{$results->ref_number}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Pengajuan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->created_at}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis KPR :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->product_type}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Developer :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->developer_name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Proyek :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->property_name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tipe Properti :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->property_type_name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Unit Properti :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->property_item_name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Harga Rumah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{number_format($results->price,2)}}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Luas Bangunan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->building_area}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lokasi Rumah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$results->home_location}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jangka Waktu :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"><mark>{{$results->200}}</mark></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">KPR Aktif :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"><mark>{{$results->active_kpr}}</mark></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Uang Muka :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"><mark>{{$results->down_payment}}</mark></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"><mark>{{$results->request_amount}}</mark></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama AO :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"><mark>{{$results->ao_name}}</mark></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static"><mark>{{$results->branch}}</mark></p>
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
@endpush