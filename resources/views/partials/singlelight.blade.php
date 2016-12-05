<div class="light-container col-md-3">

    <p class="power-icon">
      <a href="#" data-light-id="{{ $light['id'] }}" >
        <i class="fa fa-power-off" aria-hidden="true"></i>
      </a>
    </p>
    <p class="light-label">
        Label: <b>{{ $light['label'] }}</b>
    </p>
    <p class="light-product">
        {{ $light['product']['company'] }} {{ $light['product']['name'] }}
    </p>
</div>
