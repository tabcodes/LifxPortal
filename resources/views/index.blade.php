@extends('master') @section('content')


<div class="row">
    <div class="col-md-12">
        <button type="button" id="listLifx">
  List Lights
</button>

        <button type="button" id="changeLifxState">
  Toggle On/Off
</button>

        <button type="button" id="breatheLifxLights">
  Breathe All Lights
</button>


        <div>

            <label>Light Number</label>
            <input type="number" class="light-prop required"  id="lightIndex"><br>

            <label>Light brightness</label>
            <input type="number" class="light-prop required" id="lightBrightness"><br>

            <label>Light Temperature</label>
            <input type="number" class="light-prop required" id="lightTemp"><br>

            <button id="setState">
  Set State
</button>
        </div>


    </div>
</div>
<div class="row">
    @foreach($lights as $light)

      @include('partials.singlelight', $light)

    @endforeach
</div>

@endsection
