
  <div class="light-container col-md-2 col-centered col-sm-4" id="{{ $light['id'] }}">
    <div class="light-inner">
      <h3 class="light-label-header label-header-{{$light['power'] }}">
        <b>{{ $light['label'] }}</b>
      </h3>


      <div class="light-content">

        <div class="power-icon">
          @if($light['connected'] == 1)
            <a href="#" class="light-action light-action-power" data-action="togglePowerSingle" data-light-id="{{ $light['id'] }}" >
              <i class="fa fa-power-off light-power-{{ $light['power'] }}" aria-hidden="true"></i>
            </a>
          @else
            <a href="#" class="light-discon" data-action="togglePowerSingle" data-light-id="{{ $light['id'] }}" >
              <i class="fa fa-plug light-power-{{ $light['power'] }}" aria-hidden="true"></i>
            </a>
          @endif
        </div>

        <p class="light-product">
          {{ $light['product']['company'] }} {{ $light['product']['name'] }}
        </p>
        <p class="light-status">

          @if($light['connected'] == 1)
            Status: <span class="light-status-connected">Connected!</span>
            @if($light['power'] == "on")
              Power: <span class="light-status-connected">On</span>
            @else
              Power: <span class="light-status-offline">Off</span>
            @endif
          @else
            Status: <span class="light-status-offline">Offline</span>
          @endif

        </p>



      </div>

      </div>
      <div class="light-loader initial_hidden">
        <i class="fa fa-gear fa-spin "></i>
      </div>


  </div>
