        @include('partials._header')

        <!------------------------ Main ------------------------>
        <div class="layout-main columns">
            <div class="grid-8 baby-12 child-12">
                @yield('content')
            </div>

            <div class="grid-4 baby-12 child-12">
                @include('partials._sidebar')
            </div>

        </div>
        <!------------------------ /Main ------------------------>

        @include('partials._footer')
