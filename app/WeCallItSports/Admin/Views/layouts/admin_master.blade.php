        <div class="row">
            <div class="col-md-8 col-md-push-2">
                @include('partials._admin_header')

                <!------------------------ Main ------------------------>
                
                        @yield('content')
                <!------------------------ /Main ------------------------>

                @include('partials._admin_footer')
            </div>
        </div>
