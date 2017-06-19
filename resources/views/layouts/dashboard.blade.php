@extends('layouts.plane')

@section('body')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/dashboard') }}">RetroChic</a>
            </div>
            <!-- /.navbar-header -->


            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        </li>
                        <li {{ (request()->is('*users') ? 'class="active"' : '') }}>
                            <a href="{{ route('users.index') }}"><i class="glyphicon glyphicon-user"></i> Users</a>
                        </li>
                        <li {{ (request()->is('*products') ? 'class="active"' : '') }}>
                            <a href="{{ route('products.index') }}"><i class="glyphicon glyphicon-th-list"></i> Products</a>
                        </li>
                        <li {{ (request()->is('*categories') ? 'class="active"' : '') }}>
                            <a href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-sort"></i> Categories</a>
                        </li>
                        <li {{ (request()->is('*orders') ? 'class="active"' : '') }}>
                            <a href="{{ route('dashboard.orders') }}"><i class="glyphicon glyphicon-check"></i> Orders</a>
                        </li>
                        <li {{ (request()->is('*products') ? 'class="active"' : '') }}>
                            <a href="{{ route('products.index') }}"><i class="glyphicon glyphicon-backward"></i>
                                Terug naar Site</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

