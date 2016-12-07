<div class="light-container col-md-3 col-sm-6">

    <p class="power-icon">
      <a href="#" class="light-action-power" data-light-id="{{ $light['id'] }}" >
        <i class="fa fa-power-off light-power-{{ $light['power'] }}" aria-hidden="true"></i>
      </a>
    </p>
    <p class="light-label">
        Label: <b>{{ $light['label'] }}</b>
    </p>
    <p class="light-product">
        {{ $light['product']['company'] }} {{ $light['product']['name'] }}
    </p>
    <p class="light-status">
      @if($light['connected'] == 1)
        Status: <span class="light-status-connected">Connected!</span> <br>
        @if($light['power'] == "on")
          Power: <span class="light-status-connected">On</span>
        @else
          Power: <span class="light-status-offline">Off</span>
        @endif
      @else
        Status: <span class="light-status-offline">Offline</span>
      @endif

    </p>
    <p class="light-status">

    </p>
</div>
