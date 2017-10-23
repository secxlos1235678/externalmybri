<div class="col-md-12">
    <div class="panel panel-blue">
        <div class="panel-heading">
            <h3 class="panel-title text-uppercase">Data Keluarga / Kerabat Terdekat</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama</label>
                        <div class="col-md-8">
                            {!! Form::text('emergency_name', old('emergency_name'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">No. Handphone </label>
                        <div class="col-md-8">
                            {!! Form::text('emergency_contact', old('emergency_contact'), [
                                'class' => 'form-control numeric', 'minlength' => 9, 'maxlength' => 16
                            ]) !!}
                        </div>
                    </div>

                </div>    
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-5 control-label">Hubungan</label>
                        <div class="col-md-7">
                            {!! Form::text('emergency_relation', old('emergency_relation'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>