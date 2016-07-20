@include('frontend.layouts.partials.header')

    @include('frontend.layouts.partials.navigation')
    <div class="container">
        <div class="page-header" id="banner">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

@include('frontend.layouts.partials.footer')
