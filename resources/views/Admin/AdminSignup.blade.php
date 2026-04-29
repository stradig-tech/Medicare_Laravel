<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">
    <title>Admin Registration | Medic Care</title>
</head>

<body class="bg-mesh">
    
    <div class="container py-5 min-vh-100 d-flex align-items-center">
        <div class="row w-100 align-items-center justify-content-center mx-auto">
            
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">
                <div class="mb-4">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">System Administration</span>
                    <h1 class="display-4 fw-bold mb-3" style="font-family: 'Outfit', sans-serif;">
                        Manage the<br />
                        <span class="gradient-text">Network</span>
                    </h1>
                    <p class="text-secondary lead fs-5">
                        Administrators oversee the Medic Care platform, ensuring quality medical care operations, patient data integrity, and doctor verification processes.
                    </p>
                </div>
                
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm" style="width: 50px; height: 50px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Platform Control</h6>
                        <small class="text-secondary">Full access management system</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="glass-panel p-4 p-md-5">
                    <h3 class="mb-4 fw-bold">Admin Registration</h3>
                    
                    <form action="{{ route('post.admin') }}" method="post" enctype="multipart/form-data">
                        {{ @csrf_field() }}

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-secondary ms-1">First Name</label>
                                <input type="text" id="firstname" name="firstname" class="form-control form-control-premium" placeholder="First name" value="{{ old('firstname') }}" />
                                @error('firstname') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium text-secondary ms-1">Last Name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control form-control-premium" placeholder="Last name" value="{{ old('lastname') }}" />
                                @error('lastname') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium text-secondary ms-1">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control form-control-premium" placeholder="Date of Birth" value="{{ old('dob') }}" />
                                @error('dob') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium text-secondary ms-1">Role</label>
                                <select class="form-select form-control-premium" id="role" name="role">
                                    <option value="admin" selected>Admin</option>
                                </select>
                                @error('role') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <span class="d-block mb-2 text-secondary fw-medium">Gender</span>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input border-secondary" type="radio" name="gender" id="male" value="male">
                                        <label class="form-check-label text-dark" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input border-secondary" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label text-dark" for="female">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input border-secondary" type="radio" name="gender" id="other" value="other">
                                        <label class="form-check-label text-dark" for="other">Other</label>
                                    </div>
                                </div>
                                @error('gender') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <!-- Account Details -->
                            <div class="col-md-6 mt-4">
                                <label class="form-label fw-medium text-secondary ms-1">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control form-control-premium" placeholder="Email Address" value="{{ old('email') }}" />
                                @error('email') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mt-4">
                                <label class="form-label fw-medium text-secondary ms-1">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-premium" placeholder="Enter a secure password" />
                                @error('password') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <!-- Contact Details -->
                            <div class="col-md-6 mt-3">
                                <label class="form-label fw-medium text-secondary ms-1">Phone Number</label>
                                <input type="number" id="phone" name="phone" class="form-control form-control-premium" placeholder="Phone Number" value="{{ old('phone') }}" />
                                @error('phone') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label class="form-label fw-medium text-secondary ms-1">National ID</label>
                                <input type="text" id="nid" name="nid" class="form-control form-control-premium" placeholder="NID Number" value="{{ old('nid') }}" />
                                @error('nid') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label fw-medium text-secondary ms-1">Full Address</label>
                                <input type="text" id="address" name="address" class="form-control form-control-premium" placeholder="Full Home Address" value="{{ old('address') }}" />
                                @error('address') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <label for="picture" class="form-label text-secondary fw-medium">Profile Picture</label>
                                <input class="form-control py-2" type="file" id="picture" name="picture">
                                @error('picture') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 mt-4 fs-5 fw-medium animate-float">
                            Create Admin Account
                        </button>
                        
                        <div class="text-center mt-4">
                            <span class="text-secondary">Already have an account? </span>
                            <a href="{{ route('login') }}" class="text-decoration-none font-weight-bold gradient-text">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
