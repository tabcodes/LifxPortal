@extends('master')


@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Update Account</div>

                  <div class="panel-body">

                    {{ Form::model(Auth::user(), ['route' => ['users.update', Auth::user()->id] ]) }}
                    <div class="form-group">
                      {{ Form::label('email', 'Email') }}
                      {{ Form::text('email', null, ['class' => 'form-control'])}}
                    </div>

                    {{ Form::submit('Update', ['class' => 'btn btn-default']) }}

                  </div>

              </div>
          </div>
      </div>
  </div>

@endsection
