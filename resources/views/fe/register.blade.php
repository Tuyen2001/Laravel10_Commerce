@extends('fe.index')

@section('main')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                            @if ($message = Session::get('error'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                        </div>

                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <label for="login-email">
                                email address
                                <span class="required">*</span>
                            </label>
                            <input name="email" type="email" class="form-input form-wide" id="login-email" required />

                            <label for="">
                                Fullname
                                <span class="required">*</span>
                            </label>
                            <input name="name" type="text" class="form-input form-wide" id="" required />

                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input name="password" type="password" class="form-input form-wide" id="login-password" required />

                            <label for="login-password">
                                Confirm Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="" required />

                            <div class="form-footer">


                                <a href="forgot-password.html"
                                    class="forget-password text-dark form-footer-right">
                                    Bạn đã có taì khoản ?</a>
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100 mb-2">
                                Register
                            </button>
                        </form>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                        </div>

                        <form action="#">
                            <label for="register-email">
                                Email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="register-email" required />

                            <label for="register-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="register-password"
                                required />

                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
@endsection
