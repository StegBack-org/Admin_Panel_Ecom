<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Home | Vitality Club')</title>
    <meta name="robots" content="noindex, follow">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vc-owl-bootstrap-photoswipe.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vc-admin-18-11-01.css') }}" />
    <style>
        html,
        body {
            background-color: #efefef47;
        }
    </style>
    @yield('style')
</head>

<body>
    {{-- @if (Auth::user()->email === env('ADMIN_EMAIL')) --}}
    <div id="app">

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 admin-menu-cont">
                        <a href="/admin" class="admin-menu home"><i class="fas fa-home"></i>Home</a>
                        <a href="/admin/orders" class="admin-menu orders"><i class="fas fa-shopping-cart"></i>Orders</a>
                        <div class="collapse" id="ordersCollapse">
                            <a href="/admin/orders" class="admin-menu1 orders">Orders</a>
                            <a href="/admin/checkouts" class="admin-menu1 checkouts">Abandoned checkouts</a>
                        </div>
                        <a href="/admin/products" class="admin-menu products"><i class="fas fa-tag"></i>Products</a>
                        <div class="collapse" id="productsCollapse">
                            <a href="/admin/products" class="admin-menu1 products">All products</a>
                            <a href="/admin/categories" class="admin-menu1 categories">Categories</a>
                            <a href="/admin/sub-categories" class="admin-menu1 subcategories">Sub Categories</a>
                        </div>
                        <!--<a href="/admin/lookbooks" class="admin-menu lookbooks"><i class="fas fa-tags"></i>Lookbooks</a>-->
                        <a href="/admin/customers" class="admin-menu customers"><i class="fas fa-user"></i>Customers</a>
                        <a href="/admin/discounts" class="admin-menu discounts mb-4"><i
                                class="fas fa-percentage"></i>Discounts</a>

                        <a class="admin-subheading">SALES CHANNELS</a>
                        <a class="admin-menu store" onclick="storeCollapse();"><i class="fas fa-store"></i>Online
                            Store</a> <button class="btn btn-link storeBtn"
                            onclick="window.open('{{ config('app.url') }}', '_blank');"><i
                                class="far fa-eye"></i></button>
                        <div class="collapse" id="storeCollapse">
                            <a href="/admin/homepage/announcement" class="admin-menu1 announcement">Announcement</a>
                            <a href="/admin/homepage/slider" class="admin-menu1 slider">Image slider</a>
                            <a href="/admin/homepage/image-with-text-overlay" class="admin-menu1 imageWithText">Image
                                with text</a>
                            <a href="/admin/homepage/services" class="admin-menu1 services">Image with text 2</a>
                        </div>

                        <a href="/admin/settings" class="admin-menu settings"><i class="fas fa-cog"></i>Settings</a>
                    </div>
                    <div class="col-md-10 admin-main-cont">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/vc-jQuery-popper-bootstrap-owl-photoswipe.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    @yield('scriptContent')
    <script>
        function storeCollapse() {
            $('#storeCollapse').collapse('toggle');
        }
    </script>
    {{-- @else
        <script>
            window.location = "/myaccount";
        </script>
    @endif --}}
</body>

</html>
