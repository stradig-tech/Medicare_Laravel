<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">
    <title>Patient Dashboard | Medic Care</title>
</head>
<body class="bg-mesh" style="font-family: 'Outfit', sans-serif;">

    <!-- Premium Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm" style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); border-bottom: 1px solid rgba(255, 255, 255, 0.4);">
        <div class="container-fluid px-4">
            
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="{{ route('patient/dashboard') }}">
                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                </div>
                <span class="gradient-text">Patient Portal</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#patientNavbar" aria-controls="patientNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="patientNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-medium px-3 text-secondary" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium px-3 active text-primary" href="{{ route('patient/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium px-3 text-secondary" href="{{ url('appointment.history/' . $patientid) }}">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium px-3 text-secondary" href="{{ url('payment.history/' . $patientid) }}">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium px-3 text-secondary" href="{{ url('patient/prescription/' . $patientid) }}">Prescriptions</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('patient/messages/' . $patientid) }}" class="position-relative text-secondary text-decoration-none transition" title="Messages">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            {{ $datacount }}
                        </span>
                    </a>
                    
                    <div class="dropdown">
                        <a class="d-flex align-items-center text-decoration-none dropdown-toggle gap-2" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 35px; height: 35px;">
                                {{ substr(Session::get('patient_firstname'), 0, 1) }}
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 rounded-3" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item py-2" href="{{ url('patient/dashboard/profile/' . $patientid) }}">Profile</a></li>
                            <li><hr class="dropdown-divider opacity-10"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container" style="padding-top: 100px; padding-bottom: 50px;">
        
        <!-- Alerts -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center mb-4" role="alert">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center mb-4" role="alert">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                {{ Session::get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="fw-bold mb-1">Welcome back, {{ Session::get('patient_firstname') }}!</h2>
                <p class="text-secondary mb-0">Here's your healthcare overview for today.</p>
            </div>
        </div>

        <!-- Book Appointment Section -->
        <div class="mb-5">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="fw-bold mb-0">Book an Appointment</h3>
            </div>
            
            <div class="row g-4">
                @forelse ($doctors as $doctor)
                    <div class="col-md-6 col-lg-4">
                        <div class="glass-panel p-4 h-100 d-flex flex-column transition-hover">
                            <div class="text-center mb-4">
                                <img src="{{ asset('uploaded_images/' . $doctor->picture) }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctor->firstname . ' ' . $doctor->lastname) }}&background=random'" alt="Dr. {{ $doctor->firstname }}" class="rounded-circle mb-3 border shadow-sm" style="width: 100px; height: 100px; object-fit: cover; border-width: 3px !important; border-color: rgba(var(--bs-primary-rgb), 0.1) !important;">
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3">{{ $doctor->specialization }}</span>
                            </div>
                            
                            <h4 class="fw-bold text-center mb-1">Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h4>
                            <p class="text-secondary text-center small mb-3">{{ $doctor->qualification }}</p>
                            
                            <ul class="list-unstyled text-secondary small flex-grow-1">
                                <li class="d-flex align-items-start mb-2">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2 mt-1 text-primary"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    {{ $doctor->address }}
                                </li>
                            </ul>
                            
                            <a href="{{ url('appointments/' . $doctor->id) }}" class="btn btn-primary w-100 rounded-pill py-2 mt-auto">Book Consultation</a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 py-5 text-center">
                        <div class="bg-white rounded-4 shadow-sm p-5 border">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--bs-secondary)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="mb-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <h5 class="fw-bold text-secondary">No Doctors Available</h5>
                            <p class="text-muted mb-0">Check back later for available specialists.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Care Packages Section -->
        <div class="mb-5">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="fw-bold mb-0">Premium Care Packages</h3>
            </div>
            
            <div class="row g-4 justify-content-center">
                @forelse ($package as $pkg)
                    <div class="col-md-6 col-lg-4">
                        <div class="glass-panel p-0 h-100 d-flex flex-column overflow-hidden transition-hover position-relative">
                            
                            <div class="position-absolute top-0 end-0 p-3 z-index-2">
                                <span class="badge bg-white text-dark shadow-sm rounded-pill fw-bold fs-6">
                                    ${{ $pkg->price }}
                                </span>
                            </div>
                            
                            <img src="{{ asset('uploaded_images/' . $pkg->picture) }}" onerror="this.src='https://placehold.co/600x400/e9ecef/adb5bd?text=No+Image'" class="w-100" style="height: 180px; object-fit: cover;" alt="{{ $pkg->name }}">
                            
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="mb-2">
                                    <span class="badge {{ $pkg->type == 'Premium' ? 'bg-warning text-dark' : 'bg-primary bg-opacity-10 text-primary' }} rounded-pill px-2 py-1 small">
                                        {{ $pkg->type }}
                                    </span>
                                </div>
                                <h4 class="fw-bold mb-2">{{ $pkg->name }}</h4>
                                <p class="text-secondary small mb-4 flex-grow-1">{{ $pkg->description }}</p>
                                
                                <a href="{{ url('checkout/' . $pkg->id) }}" class="btn {{ $pkg->type == 'Premium' ? 'btn-dark' : 'btn-outline-primary' }} w-100 rounded-pill py-2">Select Package</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 py-5 text-center">
                        <div class="bg-white rounded-4 shadow-sm p-5 border">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--bs-secondary)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="mb-3"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                            <h5 class="fw-bold text-secondary">No Packages Available</h5>
                            <p class="text-muted mb-0">Check back later for new healthcare packages.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
