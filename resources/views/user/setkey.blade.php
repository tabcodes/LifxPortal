@extends('master')


@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Set LIFX Cloud Key</div>

                  <div class="panel-body">

                    {{ Form::open() }}


                    <div class="form-group">
                      {{ Form::label('LIFX Cloud API Key') }}
                      {{ Form::text('newapikey', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="alert alert-danger">
                        <strong>Warning:</strong> Changing your LIFX Cloud API key to an incorrect value will prevent
                        LightPortal from accessing your lights.
                    </div>

                    {{ Form::submit("I'm sure, set my key",  ['class' => 'btn btn-danger'])}}


                    {{ Form::close() }}
                  </div>

              </div>
          </div>
      </div>
  </div>

@endsection
