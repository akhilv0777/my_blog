@extends('admin.layouts.main')
@section('main-content')
    <div class="right_col" role="main" style="min-height: 4560px;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Category </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">

                            <span class="input-group-btn">
                                <a class="btn btn-secondary" href="{{ route('category.add') }}" type="button">Add
                                    Category</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Button Example <small>Users</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="categoriesTable" class="table ">

                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>category Name</th>
                                                    <th>Sub category Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            @forelse ($category->subcategories as $subcategory)
                                                                <p>{{ $subcategory->name }}</p>
                                                            @empty
                                                                <p>No subcategories</p>
                                                            @endforelse
                                                        </td>
                                                        <td>Edit</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
