<div class="mb-3">
    <a href="{{ route('flights.index', 'departure') }}" class="btn bg-white text-secondary px-4 mr-3">
        <i class="fas fa-plane-departure"></i> <b class="ml-2 d-none d-sm-inline">DEPARTURES</b>
    </a>
    <a href="{{ route('flights.index', 'arrival') }}" class="btn bg-white text-secondary px-4 mr-3">
        <i class="fas fa-plane-arrival"></i> <b class="ml-2 d-none d-sm-inline">ARRIVALS</b>
    </a>
    <a href="{{ route('running-text.index') }}" class="btn bg-white float-right text-secondary px-4">
        <i class="fas fa-font"></i> <b class="ml-2 d-none d-sm-inline">Running Text</b>
    </a>
</div>