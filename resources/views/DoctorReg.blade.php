<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">
    <title>Doctor Registration | Medic Care</title>
</head>

<body class="bg-mesh">
    
    <div class="container py-5 min-vh-100 d-flex align-items-center">
        <div class="row w-100 align-items-center justify-content-center mx-auto">
            
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5">
                <div class="mb-4">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Join Our Network</span>
                    <h1 class="display-4 fw-bold mb-3" style="font-family: 'Outfit', sans-serif;">
                        Elevate Your<br />
                        <span class="gradient-text">Practice</span>
                    </h1>
                    <p class="text-secondary lead fs-5">
                        Medic Care provides top-tier healthcare professionals the platform to deliver compassionate and expert medical care to a wider patient base.
                    </p>
                </div>
                
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm" style="width: 50px; height: 50px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Advanced Tools</h6>
                        <small class="text-secondary">Streamline your appointments</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="glass-panel p-4 p-md-5">
                    <h3 class="mb-4 fw-bold">Doctor Registration</h3>
                    
                    <form action="{{ route('Doctor-reg-post') }}" method="post" enctype="multipart/form-data">
                        {{ @csrf_field() }}

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" value="{{ old('firstname') }}" />
                                    <label for="firstname">First name</label>
                                </div>
                                @error('firstname') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name" value="{{ old('lastname') }}" />
                                    <label for="lastname">Last name</label>
                                </div>
                                @error('lastname') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth" value="{{ old('dob') }}" />
                                    <label for="dob">Date of Birth</label>
                                </div>
                                @error('dob') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <select class="form-select" id="role" name="role">
                                        <option value="doctor" selected>Doctor</option>
                                    </select>
                                    <label for="role">Role</label>
                                </div>
                                @error('role') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <span class="d-block mb-2 text-secondary fw-medium">Gender</span>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                                @error('gender') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <!-- Professional Details -->
                            <div class="col-md-6 mt-3">
                                <div class="form-floating group">
                                    <select class="form-select" id="qualification" name="qualification">
                                        <option value="" disabled selected>Select</option>
                                        <option value="MBBS">MBBS</option>
                                        <option value="FCPS">FCPS</option>
                                        <option value="FRCS">FRCS</option>
                                    </select>
                                    <label for="qualification">Qualification</label>
                                </div>
                                @error('qualification') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-floating group">
                                    <select class="form-select" id="specialization" name="specialization">
                                        <option value="" disabled selected>Select</option>
                                        <option value="surgeon">Surgeon</option>
                                        <option value="orthopredix">Orthopedics</option>
                                        <option value="sexologist">Sexologist</option>
                                        <option value="dentist">Dentist</option>
                                        <option value="medicine">Medicine</option>
                                        <option value="dermatologist">Dermatologist</option>
                                        <option value="child">Pediatrics</option>
                                        <option value="gynecologist">Gynecologist</option>
                                        <option value="psychriatist">Psychiatrist</option>
                                        <option value="diabetis">Diabetes</option>
                                        <option value="skin">Skin</option>
                                        <option value="nutritionist">Nutritionist</option>
                                    </select>
                                    <label for="specialization">Specialization</label>
                                </div>
                                @error('specialization') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <!-- Account Details -->
                            <div class="col-md-6 mt-3">
                                <div class="form-floating group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
                                    <label for="email">Email Address</label>
                                </div>
                                @error('email') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-floating group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                                    <label for="password">Password</label>
                                </div>
                                @error('password') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-floating group">
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}" />
                                    <label for="phone">Phone Number</label>
                                </div>
                                @error('phone') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-floating group">
                                    <input type="text" id="nid" name="nid" class="form-control" placeholder="NID" value="{{ old('nid') }}" />
                                    <label for="nid">National ID</label>
                                </div>
                                @error('nid') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-floating group">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}" />
                                    <label for="address">Full Address</label>
                                </div>
                                @error('address') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <label for="picture" class="form-label text-secondary fw-medium">Profile Picture</label>
                                <input class="form-control py-2" type="file" id="picture" name="picture">
                                @error('picture') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 mt-4 fs-5 fw-medium animate-float">
                            Create Doctor Account
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
