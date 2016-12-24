<div class="light-slider">
  <div class="slider-container">
    <input type="text"
    class="dial-color-light"
    value=""
    data-lifx-color="{{json_encode($light['color'])}}"
    id="color-{{$light['id']}}"
    />
  </div>
  <span class="label-icon" data-toggle="tooltip" data-placement="bottom" title="Adjust Light Color">
    <i class="fa fa-paint-brush color" aria-hidden="true" ></i>
  </span>
</div>
