@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
    <section id="error-404" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="error-image">
                        {!! Html::image('assets/images/lock-reg.png', 'image', ['class' => 'img-responsive']) !!}
                    </div>
                    <div class="error-text">
                        <h3>Password Anda sudah kami kirim ke alamat email Anda.</h3>
                        <p>Silahkan cek email Anda.</p>
                    </div>
                </div>
            </div>
            <div class="bottom-space"></div>
        </div>
    </section>
@endsection
@push('styles')
<style type="text/css">
    footer.footer_third.absolute-fix {
        bottom: 0px !important;
        position: absolute;
        width: -webkit-fill-available;
    }
</style>
@endpush
