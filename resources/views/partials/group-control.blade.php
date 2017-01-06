<div class="group-control-row row">
  <div class="col-md-2 col-sm-6 col-xs-6 group-header">
    <h2>
      {{ $group }}
    </h2>
  </div>
  <div class="col-md-offset-2 col-md-3 col-sm-offset-2 col-sm-4 col-xs-12 group-actions">
    <h2 class="action-mini" >
      <a class="power-group" data-group="{{$group}}" href="#">
        <i class="fa fa-power-off brightness" aria-hidden="true"></i>
      </a>
    </h2>
    <h2 class="action-mini" >
      <a class="brightness-group" data-group="{{$group}}" href="#">
        <i class="fa fa-lightbulb-o brightness" aria-hidden="true"></i>
      </a>
    </h2>
    <h2 class="action-mini">
      <a class="temp-group" data-group="{{$group}}" href="#">
        <i class="fa fa-thermometer-empty brightness" aria-hidden="true"></i>
      </a>
    </h2>
    @if($colorStatus == 'color')
    <h2 class="action-mini">
      <input type="text"
      class="dial-color-group"
      data-group="{{$group}}"
      />
    </h2>
  @endif

  </div>

</div>

<div class="group-control-detail">
    <div
    class="col-lg-offset-2 col-lg-8 group-detail group-brightness-container initial_hidden"
    id="{{$group}}-brightness-detail"
    >
      <input type="range"
      id="{{$group}}-brightness-slider"
      class="group-brightness-slider"
      data-group="{{$group}}"
      min="1"
      max="100"
      step="1"
      value="{{ floor($lights[0]['brightness'] * 100) }}" /><br />
      <span id="{{$group}}-brightness-text" class="group-brightness-text">
        {{floor($lights[0]['brightness'] * 100)}}%
      </span>
      <button id="{{$group}}-brightness-set" class="btn btn-default group-brightness-set" data-group="{{$group}}"/>Set</button>
    </div>
    <div
    class="col-lg-offset-2 col-lg-8 group-detail group-temp-container initial_hidden"
    id="{{$group}}-temp-detail"
    >
      <input type="range"
      id="{{$group}}-temp-slider"
      class="group-temp-slider"
      data-group="{{$group}}"
      min="2000"
      max="9000"
      step="500"
      value="{{ $lights[0]['color']['kelvin'] }}" /><br />
      <span id="{{$group}}-temp-text" class="group-temp-text">
        {{ $lights[0]['color']['kelvin'] }}K
      </span>
      <input type="button"
      id="{{$group}}-temp-set"
      class="group-temp-set"
      data-group="{{$group}}"
      value="Set" />
    </div>
</div>
