@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <div id="auth-control-row">
                    <div class="auth-action" data-link='lights'>
                      <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                      <br />
                      Light Controller
                    </div>

                    <div class="auth-action" data-link="setCloudKey/{{ Auth::user()->id }}">
                      <i class="fa fa-cog" aria-hidden="true"></i>
                      <br />
                      Set LIFX Key
                    </div>

                    <div class="auth-action" data-link="updateAccount/{{ Auth::user()->id }}">
                      <i class="fa fa-address-card" aria-hidden="true"></i>
                      <br />
                      Account Info
                    </div>




                  </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
