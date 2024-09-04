@extends('layouts.main')
@section('main-content')
    </section>
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">Category: Business
                        <form action="/search" method="get">
                            <div class="input-group">
                                <select class="custom-select form-control" name="category_id" id="category">
                                    <option selected value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                <select class="custom-select form-control text-capitalize" name="subcategory_id" id="Subcategory">
                                </select>
                                <div class="input-group-append">
                                    <button  class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#category').change(function() {
                                    var categoryId = $(this).val();
                                    var url = categoryId ? `/search/subcategories/${categoryId}` : '';
                                    $.get(url, function(data) {
                                        var $subcategorySelect = $('#Subcategory').empty();
                                        if (data.length) {
                                            $.each(data, function(index, subcategory) {
                                                $subcategorySelect.append(
                                                    `<option  value="${subcategory.id}">${subcategory.name}</option>`
                                                );
                                            });
                                        } else {
                                            $subcategorySelect.append(
                                                '<option value="">No Subcategory Available</option>');
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="row posts-entry">
                <div class="col-lg-8">
                    @foreach ($posts as $post)
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="{{ route('post.details', $post->id) }}" class="img-link me-4">
                                <img src="{{ url($post->thumbnail) }}" alt="Image" class="img-fluid">
                            </a>
                            <div>
                                <img style="height:40px ;width:40px ;border-radius:50%"
                                    src="{{ url($post->user->profile_picture) }}" alt="Image" class="img-fluid">
                                <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
                                <span class="date">{{ $post->created_at->format('F j, Y') }} <a
                                        href="#">Business</a></span>
                                <h2><a href="{{ route('post.details', $post->id) }}">{{ $post->title }}</a></h2>
                                <p>{!! \Str::limit($post->content, 100) !!}</p>
                                <p><a href="{{ route('post.details', $post->id) }}"
                                        class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links('vendor.pagination.bootstrap-5') }}
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap mb-4">
                        <form action="#" class="sidebar-search-form">
                            <span class="bi-search"></span>
                            <input type="text" class="form-control" id="s"
                                placeholder="Type a keyword and hit enter">
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="images/img_1_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                                        <div class="text">
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Food <span>(12)</span></a></li>
                            <li><a href="#">Travel <span>(22)</span></a></li>
                            <li><a href="#">Lifestyle <span>(37)</span></a></li>
                            <li><a href="#">Business <span>(42)</span></a></li>
                            <li><a href="#">Adventure <span>(14)</span></a></li>
                        </ul>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
