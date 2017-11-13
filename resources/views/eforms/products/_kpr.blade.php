@if (false)
    <div class="row">
        <div class="col-md-12">
            @include('eforms.products._product-description')
        </div>
    </div>

    <hr>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4">Developer *</label>
            <div class="col-md-8">
                {!! Form::select('developer', ['' => ''] + [
                   old('developer') => old('developer_name') 
                ], old('developer'), [
                    'class' => 'select2 developers ',
                    'data-option' => old('developer'),
                    'data-placeholder' => 'Pilih Developer',
                ]) !!}
            </div>
        </div>

         <div class="form-group kpr_type {!! $errors->has('kpr_type') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Jenis KPR *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="kpr_type" id="kpr_type">
                                                    <option value="0" selected=""> Pilih </option>
                                                    <option value="1"> Baru </option>
                                                    <option value="2"> Secondary </option>
                                                    <option value="3"> Refinancing </option>
                                                    <option value="4"> Renovasi </option>
                                                    <option value="5"> Top Up </option>
                                                    <option value="6"> Take Over </option>
                                                    <option value="7"> Take Over Top Up </option>
                                                </select>
                                                @if ($errors->has('kpr_type')) <p class="help-block">{{ $errors->first('kpr_type') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                        <div class="form-group kpr_type_property {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Jenis Properti *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="kpr_type_property" id="kpr_type_property">
                                                    <option value="0" selected=""> Pilih </option>
                                                    <option value="1"> Rumah Tapak </option>
                                                    <option value="2"> Rumah Susun/Apartment </option>
                                                    <option value="3"> Rumah Toko </option>
                                                </select>
                                                @if ($errors->has('kpr_type_property')) <p class="help-block">{{ $errors->first('kpr_type_property') }}</p> @endif
                                            </div>
                                        </div>
                                        
        <div class="form-group property-select">
            <label class="control-label col-md-4">Nama Proyek *</label>
            <div class="col-md-8">
                {!! Form::select('property', ['' => ''] + [
                    old('property') => old('property_name')
                ], old('property'), [
                    'class' => 'select2 properties',
                    'data-option' => old('property'),
                    'data-placeholder' => 'Pilih Nama Proyek',
                ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group types-select">
            <label class="control-label col-md-4">Tipe Properti *</label>
            <div class="col-md-8">
                {!! Form::select('property_type', ['' => ''] + [
                   old('property_type') => old('property_type_name') 
                ], old('property_type'), [
                    'class' => 'select2 types',
                    'data' => old('property_type'),
                    'data-placeholder' => 'Pilih Tipe Properti',
                    ]) !!}
            </div>
        </div>
        <div class="form-group units-select">
            <label class="control-label col-md-4">Unit Properti *</label>
            <div class="col-md-8">
                {!! Form::select('property_item', ['' => ''] + [
                    old('property_item') => old('property_item_name')
                ], old('property_item'), [
                    'class' => 'select2 items',
                    'data-option' => old('property_item'),
                    'data-placeholder' => 'Pilih Unit Properti',
                ]) !!}
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4">Harga Rumah *</label>
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    {!! Form::text('price', old('price'), [
                        'id' => 'price', 'class' => 'currency form-control calculate', 'maxlength' => 15, 'readonly'
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Luas Bangunan *</label>
            <div class="col-md-8">
                <div class="input-group">
                    {!! Form::text('building_area', old('building_area'), [
                        'id' => 'building_area', 'class' => 'form-control numeric calculate', 'readonly',
                        'maxlength' => 4
                    ]) !!}
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Lokasi Rumah *</label>
            <div class="col-md-8">
                {!! Form::textarea('home_location', old('home_location'), [
                    'id' => 'home_location', 'class' => 'form-control', 'rows' => 3, 'readonly',
                    'style' => 'resize: none;'
                ]) !!}
            </div>
        </div>   
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4">Jangka Waktu *</label>
            <div class="col-md-8">
                <div class="input-group">
                    {!! Form::text('year',old('year'), [
                        'class' => 'form-control numeric calculate', 'id' => 'year', 'maxlength' => 3
                    ]) !!}
                    <span class="input-group-addon">Bulan</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">KPR Aktif ke *</label>
            <div class="col-md-8">
                {!! Form::select('active_kpr', [ '' => 'Pilih', '1' => '1', '2' => '2', '3' => '> 2' ], old('active_kpr'), [
                    'class' => 'form-control select2 calculate', 'id' => 'active_kpr'
                ]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Uang Muka *</label>
            <div class="col-md-8">
                <div class="input-group">
                    {!! Form::text('dp',old('dp'), [
                        'class' => 'form-control numeric calculate currency', 'id' => 'dp', 'maxlength' => 3
                    ]) !!}
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    {!! Form::text('down_payment',old('down_payment'), [
                        'class' => 'form-control currency', 'id' => 'down_payment', 'readonly', 'maxlength' => 15
                    ]) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4">Jumlah Permohonan *</label>
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    {!! Form::text('request_amount',old('request_amount'), [
                        'class' => 'form-control currency', 'id' => 'request_amount', 'readonly', 'maxlength' => 15
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>