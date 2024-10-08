@extends('layouts.main')
@section('main-content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ url($post->thumbnail) }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $post->title }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 me-3 d-inline-block"><img
                                    src="{{ url($post->user->profile_picture) }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="container">
            <div class="row blog-entries element-animate">
                <div class="col-md-12 col-lg-12 main-content">
                    <div class="post-content-body">
                        <p>{!! $post->content !!}</p>
                        <div class="row my-4">
                            @php
                                $images = explode(',', $post->post_images);
                            @endphp
                            @foreach ($images as $image)
                                <div class="col-md-4 mb-4">
                                    <img src="{{ url('uploads/post_images/' . $image) }}" alt="Image placeholder"
                                        class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pt-5">
                        <p>Categories: {{ $post->category->name }} Subategories: {{ $post->subcategory->name }} <a></p>
                    </div>
                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p></p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="vcard">
                                    <img src="images/person_2.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p></p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard">
                                            <img src="images/person_3.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jean Doe</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>
                                            </p>
                                            <p><a href="#" class="reply rounded">Reply</a></p>
                                        </div>
                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard">
                                                    <img src="images/person_4.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Jean Doe</h3>
                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                    <p></p>
                                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard">
                                                            <img src="images/person_5.jpg" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Jean Doe</h3>
                                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                                            <p></p>
                                                            <p><a href="#" class="reply rounded">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- END comment-list -->
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="{{route('comments.store')}}" method="post" class="p-5 bg-light">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="comment_text" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
