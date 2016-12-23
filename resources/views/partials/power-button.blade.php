<div class="power-icon">
  @if($light['connected'] == 1)
    <a href="#" class="light-action light-action-power" data-action="togglePowerSingle" id="power-{{ $light['id'] }}" data-light-id="{{ $light['id'] }}" >
      <i class="fa fa-power-off light-power-{{ $light['power'] }}" aria-hidden="true"></i>
    </a>
  @else
    <a href="#" class="light-discon" data-action="togglePowerSingle" data-light-id="{{ $light['id'] }}" >
      <i class="fa fa-plug light-power-{{ $light['power'] }}" aria-hidden="true"></i>
    </a>
  @endif
</div>
