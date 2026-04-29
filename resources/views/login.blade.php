<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <title>Login - Medic Care</title>
</head>

<body style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: 100vh;">
    <!-- Section: Design Block -->
    <section class="d-flex align-items-center" style="min-height: 100vh;">
        <!-- Jumbotron -->
        <div class="container text-center text-lg-start">
                <div class="row gx-lg-5 align-items-center">


                    <div class="col-lg-6 mb-5 mb-lg-0 animate-float">
                        <div class="glass-panel">
                            <div class="card-body">
                                <h1 class="text-gradient display-5 fw-bold ls-tight text-center mb-5 ">
                                    Welcome Back<br />
                                </h1>

                                <form action="{{ route('login-user') }}" method="post">

                                    {{ @csrf_field() }}

                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif
                                    @if (Session::has('fail'))
                                        <div class="alert alert-dark">{{ Session::get('fail') }}</div>
                                    @endif

                                    <!-- email -->
                                    <div class="form-outline mb-4 ">
                                        <input type="email" id="email" name="email" class="form-control form-control-premium fs-5"
                                            placeholder="Email Address" value="{{ old('email') }}" />

                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>

                                    <!-- password -->
                                    <div class="form-outline mb-4 ">
                                        <input type="password" id="password" name="password" class="form-control form-control-premium fs-5"
                                            placeholder="Password" />

                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            Remember me
                                        </label>
                                    </div>

                                    <!-- Submit button -->

                                    <div class="text-center">
                                        <button type="submit" class="btn-premium w-100 mb-4 fs-5">
                                            Login securely
                                        </button>
                                    </div> <br>

                                    <h6 class="text-center text-muted">Haven't Created an account? <br><br><span> <a class="btn-premium-outline text-decoration-none"
                                                href="{{ route('registration') }}">Register Here</a></span></h6>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0 ps-lg-5">
                        <h1 class="my-5 display-3 fw-bold ls-tight text-dark">
                            Medic Care for<br />
                            <span class="text-gradient"> Quality medical care</span>
                        </h1>
                        <p class="fs-5 text-muted" style="line-height: 1.8;">
                            Medic Care is a leading healthcare provider committed to delivering quality medical care to
                            patients in a compassionate and personalized manner.
                            Our team of experienced healthcare professionals offers a wide range of services, from
                            routine check-ups to specialized treatments, to help our patients achieve optimal health
                            outcomes.
                        </p>
                    </div>
                </div>
            </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
