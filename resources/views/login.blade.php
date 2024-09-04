<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="blog/css/aos.css">
    <link rel="stylesheet" href="blog/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="hero overlay inner-page bg-primary py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">Login Us</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('loginUs') }}" method="post">
                        @csrf
                        <!-- Display Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- Display Error Message -->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <!-- Email Field -->
                            <div class="col-12 mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Your Email"
                                    value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Password Field -->
                            <div class="col-12 mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Your Password"
                                    required>
                                @if ($errors->has('password'))
                                    <div class="text-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12">
                                <input type="submit" value="Login" class="btn btn-primary">
                                <a href="{{ route('register') }}" class="btn float-end  pt-4 pe-5 me-5"
                                    href="">Dont Have Account ?</a>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div> <!-- /.untree_co-section -->
    <script src="blog/js/bootstrap.bundle.min.js"></script>
    <script src="blog/js/aos.js"></script>
    <script src="blog/js/custom.js"></script>
</body>

</html>
