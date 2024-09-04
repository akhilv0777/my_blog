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
                                <a class="btn btn-secondary" href="{{route('category.add')}}" type="button">Add Category</a>
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
                                                    <th>Category Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td> <!-- Use $key + 1 to start counting from 1 -->
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        j
                                                        {{-- <a href="{{ route('categories.edit', $category->id) }}"
                                                           class="text-blue-600 hover:text-blue-900">Edit</a> --}}
                                                        {{-- <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                              style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2"
                                                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                        </form> --}}
                                                    </td>
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
