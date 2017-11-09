<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>NIK (*)</label>
            @if ($type != 'view')
                {!! Form::text('nik', (old('nik')) ? old('nik') : @$results['personal']['nik'], [
                    'class' => 'form-control numeric', 'maxlength' => 16,
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;">{{isset($results['personal']['nik']) ? $results['personal']['nik'] : ''}}</span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Nama (*)</label>
            @if ($type != 'view')
                {!! Form::text('name', @$results['personal']['first_name'].' '.@$results['personal']['last_name'], [
                    'class' => 'form-control',
                    'style' => "text-transform:uppercase;"
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;text-transform: uppercase;">
                    {{isset($results['personal']['first_name']) ? $results['personal']['first_name'].' '.$results['personal']['last_name'] : ''}}
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Tempat lahir (*)</label>
            @if ($type != 'view')
            {!! Form::select('birth_place_id', [@$results['personal']['birth_place_id'] => @$results['personal']['birth_place_']], old('birth_place_id'), [
                'class' => 'form-control select2 cities birth_place',
                'data-placeholder' => 'Pilih Kota',
            ]) !!}
            <input type="hidden" name="birth_place" id="birth_place" value="{{@$results['personal']['birth_place']}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['birth_place']) ? $results['personal']['birth_place'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Tanggal lahir (*)</label>
            <div>
                <div class="input-group">
                    @if ($type != 'view')
                    {!! Form::text('birth_date', (old('birth_date')) ? old('birth_date') : @$results['personal']['birth_date'], [
                    'class' => 'form-control datepicker-autoclose'
                    ]) !!}
                    <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                    @else
                    <span class="form-control" style="border: 0px;">
                        {{isset($results['personal']['birth_date']) ? $results['personal']['birth_place'] : ''}}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="single-query form-group bottom20">
            <label>Alamat (*)</label>
            @if ($type != 'view')
                {!! Form::textarea('address', (old('address')) ? old('address') : @$results['personal']['address'], [
                    'class' => 'form-control',
                    'rows'  => 3,
                    'style' => 'resize: none'
                ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['address']) ? $results['personal']['address'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Kota (*)</label>
            @if ($type != 'view')
            {!! Form::select('city_id', ['' => ''], (old('city_id')) ? old('city_id') : @$results['personal']['city_id'], [
                'class' => 'form-control select2 cities city',
                'data-placeholder' => 'Pilih Kota',
            ]) !!}
            <input type="hidden" name="city" id="city_text" value="{{@$results['personal']['city']}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['city']) ? $results['personal']['city'] : ''}}
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Jenis Kelamin (*)</label>
            @if ($type != 'view')
            {!! Form::select('gender', [
                'L' => 'Laki-laki',
                'P' => 'Perempuan',
            ], (old('gender')) ? old('gender') : ($results['personal']['gender'] == 'Laki-laki' || $results['personal']['gender'] == 'L') ? 'L' : 'P', [
                'class' => 'form-control select2 gender', 'id' => 'gender'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['gender']) ? $results['personal']['gender'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Kewarganegaraan (*)</label>
            @if ($type != 'view')
            {!! Form::select('citizenship_id', ['' => ''], (old('citizenship_id')) ? old('citizenship_id') : $results['personal']['citizenship_id'], [
                'class' => 'form-control select2 citizenships',
                'data-placeholder' => 'Pilih Negara',
            ]) !!}
            <input type="hidden" name="citizenship" id="citizenship" value="{{@$results['personal']['citizenship']}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['citizenship']) ? $results['personal']['citizenship'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Status Pernikahan (*)</label>
            @if ($type != 'view')
            {!! Form::select('status_id', [
                '1' => 'Belum Menikah',
                '2' => 'Menikah',
                '3' => 'Janda / Duda',
            ], (old('status')) ? old('status') : $results['personal']['status_id'], [
                'class' => 'form-control select2 status', 'id' => 'status_id'
            ]) !!}
            <input type="hidden" name="status" id="status" value="{{@$results['personal']['status']}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['status']) ? $results['personal']['status'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Status Tempat Tinggal (*)</label>
            @if ($type != 'view')
            {!! Form::select('address_status_id', [
                '0' => 'Milik Sendiri',
                '1' => 'Milik Orang Tua / Mertua atau Rumah Dinas',
                '3' => 'Tinggal di Rumah Kontrakan',
            ], (old('address_status_id')) ? old('address_status_id') : $results['personal']['address_status_id'], [
                'class' => 'form-control select2 address_status', 'id'=> 'address_status_id'
            ]) !!}
            <input type="hidden" name="address_status" id="address_status" value="{{@$results['personal']['address_status']}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['address_status']) ? $results['personal']['address_status'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Email</label>
            @if ($type != 'view')
            {!! Form::email('email', (old('email')) ? old('email') : $results['personal']['email'], [
                'class' => 'form-control', 'readonly', 'style' => 'text-transform: none;'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['email']) ? $results['personal']['email'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>No Telepon</label>
            @if ($type != 'view')
            {!! Form::text('phone', old('phone'), [
                'class' => 'form-control numeric', 'maxlength' => 16, 'minlength' => 7
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['phone']) ? $results['personal']['phone'] : ''}}
            </span>
            @endif
        </div>

         <div class="single-query form-group bottom20">
            <label>No Handphone</label>
            @if ($type != 'view')
            {!! Form::text('mobile_phone', old('mobile_phone'), [
                'class' => 'form-control numeric', 'maxlength' => 16, 'minlength' => 7
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['mobile_phone']) ? $results['personal']['mobile_phone'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Nama Ibu Kandung</label>
            @if ($type != 'view')
            {!! Form::text('mother_name', (old('mother_name')) ? old('mother_name') : @$results['personal']['mother_name'], [
                'class' => 'form-control'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['mother_name']) ? $results['personal']['mother_name'] : ''}}
            </span>
            @endif
        </div>
        @if ($type != 'view')
        <div class="single-query form-group bottom20 has-upload-file">
            <label>Foto KTP</label>
            {!! Form::file('identity', [
                'class' => 'filestyle', 'data-target' => 'ktp_preview',
                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
            ]) !!}
        </div>
        @endif

        @if ( isset($results['other']['identity']) && $results['other']['identity'])

            <div class="single-query form-group bottom20">
                <label>Foto KTP</label>
                {!! Html::image(image_checker($results['other']['identity']), 'KTP', [
                    'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_preview',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
            </div>

        @else

            <div class="single-query form-group bottom20">
                <label>Foto KTP</label>
                {!! Html::image(image_checker(), 'KTP', [
                    'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_preview',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
            </div>

        @endif
    </div>
    @if ($type != 'view')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @endif
</div>