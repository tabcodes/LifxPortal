<div class="light-slider slider-brightness">
  <div class="slider-container">
    <input type="text" class="dial-brightness"
    data-skin="tron" value="{{ floor($light['brightness'] * 100) }}"
    min="0" max="100" step="1"
    id="brightness-{{$light['id']}}"/>
  </div>
  <span class="label-icon">
    <i class="fa fa-lightbulb-o brightness" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Adjust Light Brightness"></i>
  </span>
</div>
