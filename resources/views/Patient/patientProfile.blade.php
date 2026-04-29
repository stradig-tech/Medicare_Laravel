<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Medic Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8f9fa; padding: 2rem; }
        .profile-img { width: 180px; height: 180px; object-fit: cover; border: 5px solid white; box-shadow: 0 8px 16px rgba(0,0,0,0.1); }
        .profile-card { border-radius: 16px; overflow: hidden; border: none; }
        .data-row { padding: 1rem 0; border-bottom: 1px solid rgba(0,0,0,0.05); }
        .data-row:last-child { border-bottom: none; }
        .data-label { font-weight: 500; color: #64748b; font-size: 0.95rem; }
        .data-value { font-weight: 500; color: #1e293b; font-size: 1.05rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">My Profile</h2>
            <p class="text-secondary mb-0">Manage your personal information.</p>
        </div>
        <a href="{{ route('patient/dashboard') }}" class="btn btn-outline-primary rounded-pill px-4 fw-medium">
            <i class="fas fa-arrow-left me-2"></i> Dashboard
        </a>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible bg-white border-0 shadow-sm border-start border-success border-4 mb-4" role="alert">
            <i class="fas fa-check-circle text-success me-2"></i> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="glass-panel text-center p-4 profile-card animate-float h-100">
                <div class="card-body py-4">
                    <img src="{{ asset('uploaded_images/' . $patient->picture) }}" alt="avatar" class="rounded-circle profile-img mb-4" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($patient->firstname . ' ' . $patient->lastname) }}&background=EBF4FF'">
                    <h4 class="fw-bold mb-1">{{ $patient->firstname }} {{ $patient->lastname }}</h4>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-3 mt-2 d-inline-block">
                        <i class="fas fa-user-circle me-1"></i> Patient Account
                    </span>
                    <p class="text-secondary mb-4 px-3"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $patient->address }}</p>
                    
                    <a href="{{ url('patient/dashboard/profile/' . $patientid . '/edit') }}" class="btn-premium w-100 rounded-pill d-inline-block py-2">
                        <i class="fas fa-user-edit me-2"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="glass-panel profile-card p-4 animate-float h-100" style="animation-delay: 0.1s;">
                <div class="card-body">
                    <h5 class="fw-bold text-primary mb-4 pb-2 border-bottom"><i class="fas fa-id-card me-2"></i> Personal Details</h5>
                    
                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="far fa-user me-2 text-secondary"></i> First Name</div>
                        <div class="col-sm-8 data-value">{{ $patient->firstname }}</div>
                    </div>
                    
                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="far fa-user me-2 text-secondary"></i> Last Name</div>
                        <div class="col-sm-8 data-value">{{ $patient->lastname }}</div>
                    </div>

                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="fas fa-phone-alt me-2 text-secondary"></i> Phone Number</div>
                        <div class="col-sm-8 data-value">{{ $patient->phone }}</div>
                    </div>

                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="far fa-id-badge me-2 text-secondary"></i> National ID (NID)</div>
                        <div class="col-sm-8 data-value">{{ $patient->nid }}</div>
                    </div>

                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="far fa-map me-2 text-secondary"></i> Home Address</div>
                        <div class="col-sm-8 data-value">{{ $patient->address }}</div>
                    </div>

                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="fas fa-venus-mars me-2 text-secondary"></i> Gender</div>
                        <div class="col-sm-8 data-value text-capitalize">{{ $patient->gender }}</div>
                    </div>

                    <div class="data-row row align-items-center">
                        <div class="col-sm-4 data-label"><i class="far fa-calendar-alt me-2 text-secondary"></i> Date Of Birth</div>
                        <div class="col-sm-8 data-value">{{ \Carbon\Carbon::parse($patient->dob)->format('M d, Y') }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
