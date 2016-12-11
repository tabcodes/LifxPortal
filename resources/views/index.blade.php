@extends('master') @section('content')

<div class="row master-row">


</div>

<div class="row" id="light-control-row">
    @foreach($lights as $light)

      @include('partials.singlelight', $light)

    @endforeach
</div>

@endsection
