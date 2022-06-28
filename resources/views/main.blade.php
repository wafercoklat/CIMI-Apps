<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('comp.header-script')
    <body>
        <div class="container-scroller">
            @include('comp.header')
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    @yield('content')
                    @include('comp.footer')
                </div>
            </div>
        </div>
    </body>
    @include('comp.footer-script')
    @yield('print')
</html>
