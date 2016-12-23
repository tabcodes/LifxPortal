
  <div class="light-container col-lg-2 col-md-3 col-centered col-sm-5" id="{{ $light['id'] }}">
    <div class="light-inner">
      <h4 class="light-label-header label-header-{{$light['power'] }}">
        <b>{{ $light['label'] }}</b>
      </h4>


      <div class="light-content">

        @include('partials.power-button')

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

        @include('partials.slider-brightness')

        @if($light['product']['capabilities']['has_color'])
          @include('partials.slider-color')
        @endif


      @if($light['product']['capabilities']['has_variable_color_temp'])
        @include('partials.slider-temp')
      @endif


      <div class="light-button-container">
        <button class="button light-button light-button-apply btn btn-default" data-light-id="{{ $light['id'] }}" id="setstate-{{ $light['id'] }}" type="button">
          Apply Changes
        </button>

      </div>

      </div>
      <div class="light-loader initial_hidden">
        <i class="fa fa-gear fa-spin "></i>
      </div>


  </div>
