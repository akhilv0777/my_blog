@extends('admin.layouts.main')
@section('main-content')
    <div class="right_col" role="main" style="min-height: 3793px;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Post</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a class="btn btn-secondary" href="{{ route('post.show') }}" type="button">Show
                                    Post</a>
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
                            <h2>Add Post </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('mypost.store') }}" enctype="multipart/form-data"
                                class="form-horizontal form-label-left">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Post
                                        Name
                                        <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="title" id="" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category
                                        <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="category" class="form-control" name="category_id">
                                            <option value="0">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="Subcategory">Sub
                                        Category
                                        <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="Subcategory" class="form-control" name="subcategory_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Content
                                        <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea name="content" class="form-control editor" cols="10" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Thumbnail
                                        <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="thumbnail" class="file-control ">
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Post Images
                                        <span>*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input multiple type="file" multiple name="post_images[]" class="file-control">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var categoryId = $(this).val();
                var url = categoryId && categoryId != '0' ? '/admin/post/subcategories/' + categoryId : '';
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#Subcategory').empty().append(categoryId ? $.map(data, function(v) {
                            return '<option value="' + v.id + '">' + v.name +
                                '</option>';
                        }) : '<option value="">Select Subcategory</option>');
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        new(class {
            constructor(selector) {
                ClassicEditor.create(document.querySelector(selector));
            }
        })('.editor');
    </script>
@endsection
