@extends('master')


@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Error</div>

                  <div class="panel-body">
                    {{ $error['message'] }}
                  </div>

              </div>
          </div>
      </div>
  </div>

@endsection
