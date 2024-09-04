@extends('admin.layouts.main')
@section('main-content')
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="right_col" role="main">
                    <div class>
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Admin Profile</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="x_content">
                                                <div class="col-md-3 col-sm-3  profile_left">
                                                    <div class="profile_img">
                                                        <div id="crop-avatar">
                                                            <img class="img-responsive avatar-view" style="height: 150px ;width:auto" src="{{ url($Profile->profile_picture) }}"
                                                                alt="Avatar" title="Change the avatar">
                                                        </div>
                                                    </div>
                                                    <h3>{{ ucwords($Profile->name) }}</h3>
                                                    <ul class="list-unstyled user_data">
                                                        <li>
                                                            <i class="fa fa-envelope user-profile-icon"></i> {{ strtolower($Profile->email) }} 
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="x_content">
                                                <form method="post" action="{{ route('admin.profile.update') }}"
                                                    enctype="multipart/form-data" class="form-horizontal form-label-left"
                                                    novalidate="">
                                                    @csrf
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                            for=""> Name <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input value="{{ $Profile->name }}" name="name"
                                                                type="text" id="" required="required"
                                                                class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                            for="last-name">Email <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" value="{{ $Profile->email }}"
                                                                name="email" required="required" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label for=""
                                                            class="col-form-label col-md-3 col-sm-3 label-align">Profile
                                                            Picture</label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input id="" class="file-control" type="file"
                                                                name="profile_picture">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                            <button class="btn btn-primary" type="button">Cancel</button>
                                                            <button class="btn btn-primary" type="reset">Reset</button>
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
