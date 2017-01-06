@extends('master')


@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Set LIFX Cloud Key</div>

                  <div class="panel-body">
                    <div class="alert alert-info">
                      <h4>Getting your LIFX Cloud Key</h4>
                      <span>
                        To obtain your LIFX Cloud Key, sign into
                        <a href="https://cloud.lifx.com">cloud.lifx.com
                          <i class="fa fa-external-link" aria-hidden="true"></i>
                        </a>
                        using the e-mail and password you set when setting up your lights from the
                        mobile application. Once logged in, under your email address, select 'Settings' and click
                        'Generate New Token'. Give your token a label, copy it, and paste it into the area below.
                      </span>
                    </div>

                    {{ Form::open() }}


                    <div class="form-group">
                      {{ Form::label('LIFX Cloud API Key') }}
                      {{ Form::text('newapikey', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="alert alert-danger">
                        <span>
                          <strong>Warning:</strong> Changing your LIFX Cloud API key to an incorrect value will prevent
                          LightPortal from accessing your lights.
                        </span>
                    </div>

                    {{ Form::submit("I'm sure, set my key",  ['class' => 'btn btn-danger'])}}


                    {{ Form::close() }}
                  </div>

              </div>
          </div>
      </div>
  </div>

@endsection
