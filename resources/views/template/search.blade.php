<!-- Search Bar -->
<div class="search-bar">
    <div class="row">
        <div class="col-12 text-light" align="right">
            <ion-icon size="large" class="text-light px-3 py-3 search-close-btn" name="close-outline"></ion-icon>
        </div>
        <div class="col-12 text-light mt-5" align="center">
            <h3 class="text-light">{{ __('lang.pencarian.title') }}</h3>
            <span>{{ __('lang.pencarian.subtitle') }}</span>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-10 col-md-4" align="center">
            <form method="post" action="{{ @URL::to('/search') }}">
                {{ csrf_field() }}
                <input type="text" name="pencarian" class="search-input py-2 px-3 rounded" placeholder="{{ __('lang.pencarian.placeholder') }}" />
            </form>
        </div>
    </div>
</div>
