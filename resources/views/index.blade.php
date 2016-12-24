@extends('master') @section('content')

<div class="row master-row">


</div>

<div class="row" id="light-control-row">
  @foreach($groups as $group => $colorStatus)



    <div class="group-container row" id="group-{{ $group }}" data-group="{{ $group }}">

      @include('partials.group-control')
      <div id="light-box-{{ $group }}">
        @foreach($lights as $light)
          @if( $light['group']['name'] == $group)
            @include('partials.singlelight', $light)
          @endif
        @endforeach
      </div>

    <div class="group-loader initial_hidden" id="group-{{$group}}-loader">
      <i class="fa fa-gear fa-spin"></i>
    </div>
  </div>


  @endforeach
</div>


@endsection
