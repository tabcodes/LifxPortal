@extends('master')


@section('content')


<div class="row" id="title-row">
  <div class="col-md-offset-3 col-md-6">
    <h1 class="top-def">light·por·tal</h1>
    <h2 class="bottom-def">/līt-pôrdl/</h2>
    <div id="full-def">
      A web application compatible with LIFX lightbulbs used to set the
      color, temperature, and brightness of your lights.
    </div>
  </div>


</div>

<br /><br />

<div id="desc-row">

    <div class="col-md-3 col-sm-10 col-xs-10 desc-item">
      <h3 class="desc-title">Register an Account</h2>
        <div class="desc-body">
          <i class="icon ion-ionic"></i>
          <br />
          <div class="desc-text">
            Sign up with your email and a password- that's it!
          </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-10 col-xs-10  desc-item">
      <h3 class="desc-title">Set your LIFX Key</h2>
        <div class="desc-body">
          <i class="icon ion-outlet"></i>
          <br />
          <div class="desc-text">
            Get your Cloud Key from LIFX Cloud and set it on your Account page!
          </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-10 col-xs-10 desc-item">
      <h3 class="desc-title">Control your Lights!</h2>

        <div class="desc-body">
          <i class="icon ion-levels"></i>
          <br />
          <div class="desc-text">
            Change your lights from anywhere!
          </div>
        </div>
    </div>

</div>


@endsection
