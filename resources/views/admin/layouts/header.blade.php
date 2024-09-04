<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ url('build/css/custom.min.css') }}" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('admin.index') }}" class="site_title"><i class="fa fa-paw"></i> <span>{{ greetingMessage() }}</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if (profile()->profile_picture)
                                <img src="{{ url(profile()->profile_picture) }}" class="img-circle profile_img"
                                    alt="">
                            @else
                                <img style="height:50px ;with:auto" src="{{ asset('blog/images/img_6_sq.jpg') }}"
                                    alt="Default Image">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ ucwords(profile()->name)}}</h2>
                        </div>
                    </div>
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Dashboard </a></li>
                                <li><a><i class="fa fa-edit"></i> Category <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('category.show') }}">All Category</a></li>
                                        <li><a href="{{ route('category.add') }}">Add Category</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Sub Category <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('subcategory.show') }}">All Sub Category</a></li>
                                        <li><a href="{{ route('subcategory.add') }}">Add Sub Category</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Post <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('post.show') }}">All Post</a></li>
                                        <li><a href="{{ route('post.add') }}">Add Post</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Post Comments</a></li>
                                <li><a href="{{ route('admin.users') }}"><i class="fa fa-edit"></i>All Users</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    @if (profile()->profile_picture)
                                        <img src="{{ url(profile()->profile_picture) }}" alt="">
                                    @else
                                        <img style="height:50px ;with:auto"
                                            src="{{ asset('blog/images/img_6_sq.jpg') }}" alt="Default Image">
                                    @endif
                                    {{ ucwords(profile()->name) }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.profile') }}"> Profile</a>
                                    <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
