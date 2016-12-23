<div class="light-slider ">
  <div class="slider-container">
    <input type="text" class="dial-temperature"
    data-skin="tron" value="{{ $light['color']['kelvin'] }}"
    min="0" max="100" step="1"
    id="temp-{{$light['id']}}"/>
  </div>
  <span class="label-icon" data-toggle="tooltip" data-placement="bottom" title="Adjust Light Temperature">
    <i class="fa fa-thermometer-empty brightness" aria-hidden="true"></i>
  </span>
</div>
</div>
