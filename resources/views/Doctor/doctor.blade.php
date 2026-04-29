<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Dashboard | Medic Care</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">
    
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #f8f9fa; }
        .sidebar { background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%); min-height: 100vh; position: fixed; top: 0; left: 0; width: 250px; z-index: 1000; transition: all 0.3s; }
        .main-content { margin-left: 250px; padding: 20px; transition: all 0.3s; }
        .nav-link { color: rgba(255,255,255,0.8); padding: 15px 20px; font-weight: 500; transition: all 0.2s; display: flex; align-items: center; gap: 10px; }
        .nav-link:hover, .nav-link.active { color: #fff; background: rgba(255,255,255,0.1); text-decoration: none; border-radius: 8px; margin: 0 10px; }
        .custom-card { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s; }
        .custom-card:hover { transform: translateY(-5px); }
        .table-responsive { border-radius: 10px; overflow: hidden; box-shadow: 0 0 15px rgba(0,0,0,0.05); }
        .table { margin-bottom: 0; background: white; }
        .table thead th { border-bottom: none; background: rgba(var(--bs-primary-rgb), 0.05); color: var(--bs-primary); font-weight: 600; text-transform: uppercase; font-size: 0.85rem; padding: 15px; }
        .table tbody td { padding: 15px; vertical-align: middle; }
        .avatar-img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav class="sidebar text-white shadow-lg">
        <div class="p-4 d-flex align-items-center gap-3">
            <div class="bg-white rounded-circle p-2 d-flex align-items-center justify-content-center text-primary" style="width: 40px; height: 40px;">
                <i class="fas fa-stethoscope fs-5"></i>
            </div>
            <h4 class="mb-0 fw-bold text-white tracking-wider">Medic Care</h4>
        </div>
        
        <hr class="border-white opacity-25 mx-3 mt-0">
        
        <div class="px-3 pb-3">
            <div class="d-flex align-items-center gap-3 mb-4 mt-2 px-2">
                <img src="{{ asset('uploaded_images/' . $doctor->picture) }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctor->firstname . ' ' . $doctor->lastname) }}&background=random'" class="rounded-circle border border-2 border-white" width="45" height="45" style="object-fit:cover;">
                <div>
                    <h6 class="mb-0 text-white fw-bold">Dr. {{ $doctor->firstname }}</h6>
                    <small class="text-white-50">{{ $doctor->specialization }}</small>
                </div>
            </div>
        </div>

        <ul class="nav flex-column mb-auto">
            <li class="nav-item mb-1">
                <a href="#summary" class="nav-link active">
                    <i class="fas fa-chart-pie w-20px"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#appointment" class="nav-link">
                    <i class="fas fa-calendar-check w-20px"></i> Appointments
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#meeting" class="nav-link">
                    <i class="fas fa-video w-20px"></i> Meetings
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#prescription" class="nav-link">
                    <i class="fas fa-file-medical w-20px"></i> Prescriptions
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#patient" class="nav-link">
                    <i class="fas fa-users w-20px"></i> admitted Patients
                </a>
            </li>
        </ul>
        
        <div class="position-absolute bottom-0 w-100 p-3">
            <a href="{{ route('doctor.profile', $doctor->id) }}" class="btn btn-light w-100 mb-2 rounded-3 text-primary fw-medium text-start"><i class="fas fa-user-circle me-2"></i> My Profile</a>
            <a href="{{ route('logout') }}" class="btn btn-danger bg-opacity-10 text-white border-0 w-100 rounded-3 text-start"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        
        <!-- Header -->
        <header class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded-4 shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="mb-0 fw-bold text-dark">Overview</h4>
            </div>
            
            <div>
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-medium"><i class="fas fa-circle text-success small me-1"></i> Online</span>
            </div>
        </header>

        <!-- Alerts -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center" role="alert">
                <i class="fas fa-check-circle me-2 fs-5"></i>
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center" role="alert">
                <i class="fas fa-exclamation-circle me-2 fs-5"></i>
                {{ Session::get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Stats Row -->
        <div class="row g-4 mb-4" id="summary">
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card bg-primary text-white h-100">
                    <div class="card-body p-4 position-relative overflow-hidden">
                        <i class="fas fa-calendar-alt position-absolute text-white opacity-25" style="font-size: 5rem; right: -10px; bottom: -10px;"></i>
                        <h6 class="text-uppercase fw-semibold mb-3 opacity-75">Appointments</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ $appointmentcount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card bg-info text-white h-100">
                    <div class="card-body p-4 position-relative overflow-hidden">
                        <i class="fas fa-users position-absolute text-white opacity-25" style="font-size: 5rem; right: -10px; bottom: -10px;"></i>
                        <h6 class="text-uppercase fw-semibold mb-3 opacity-75">Patients</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ $patientcount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card bg-warning text-dark h-100">
                    <div class="card-body p-4 position-relative overflow-hidden">
                        <i class="fas fa-video position-absolute text-dark opacity-10" style="font-size: 5rem; right: -10px; bottom: -10px;"></i>
                        <h6 class="text-uppercase fw-semibold mb-3 opacity-75">Meetings</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ $meetingcount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card bg-success text-white h-100">
                    <div class="card-body p-4 position-relative overflow-hidden">
                        <i class="fas fa-prescription position-absolute text-white opacity-25" style="font-size: 5rem; right: -10px; bottom: -10px;"></i>
                        <h6 class="text-uppercase fw-semibold mb-3 opacity-75">Prescriptions</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ $prescriptioncount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row g-4">
            
            <!-- Appointments -->
            <div class="col-12" id="appointment">
                <div class="card custom-card">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0"><i class="fas fa-list text-primary me-2"></i> Appointment Requests</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Patient</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($appointment as $apt)
                                        <tr>
                                            <td><span class="badge bg-light text-dark border">#{{ $apt->id }}</span></td>
                                            <td>
                                                <div class="fw-bold">{{ $apt->patientname }}</div>
                                                <small class="text-secondary">{{ $apt->patientphone }} | {{ $apt->patientgender }}</small>
                                            </td>
                                            <td>
                                                <div class="text-primary fw-medium">{{ $apt->specialization }}</div>
                                            </td>
                                            <td>{{ $apt->appointmentdate }}</td>
                                            <td>
                                                @if($apt->appointmentstatus == 0)
                                                    <span class="badge bg-warning text-dark px-2 py-1 rounded-pill"><i class="fas fa-clock me-1"></i> Pending</span>
                                                @else
                                                    <span class="badge bg-success px-2 py-1 rounded-pill"><i class="fas fa-check me-1"></i> Approved</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end gap-2">
                                                    @if ($apt->appointmentstatus == 0)
                                                        <a href="{{ route('appointments.approve', $apt->id) }}" class="btn btn-sm btn-success rounded-3 px-3"><i class="fas fa-check"></i> Approve</a>
                                                    @endif
                                                    <a href="{{ route('appointments.delete', $apt->id) }}" class="btn btn-sm btn-outline-danger rounded-3"><i class="fas fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center py-4 text-muted">No appointments found.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" id="meeting">
                <div class="card custom-card h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h5 class="fw-bold mb-0"><i class="fas fa-video text-primary me-2"></i> Send Meeting Links</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Meeting Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sendlink as $link)
                                        @if ($link->appointmentstatus === 1)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <img src="{{ asset('uploaded_images/' . $link->patientpicture) }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($link->patientname) }}&background=random'" class="avatar-img rounded-circle">
                                                        <div>
                                                            <div class="fw-bold">{{ $link->patientname }}</div>
                                                            <small class="text-secondary">Apt #{{ $link->id }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="{{ route('appointments.sendmessage') }}" method="post" class="d-flex gap-2">
                                                        @csrf
                                                        <input type="hidden" name="appointmentid" value="{{ $link->id }}">
                                                        <input type="text" name="message" class="form-control form-control-sm rounded-3" placeholder="https://zoom.us/j/..." required>
                                                        <button class="btn btn-sm btn-primary rounded-3 px-3" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr><td colspan="2" class="text-center py-4 text-muted">No approved appointments.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" id="prescription">
                <div class="card custom-card h-100">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h5 class="fw-bold mb-0"><i class="fas fa-file-medical text-primary me-2"></i> Prescribe Patients</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prescription as $presc)
                                        @if ($presc->appointmentstatus === 1)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <img src="{{ asset('uploaded_images/' . $presc->patientpicture) }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($presc->patientname) }}&background=random'" class="avatar-img rounded-circle">
                                                        <div>
                                                            <div class="fw-bold">{{ $presc->patientname }}</div>
                                                            <small class="text-secondary">Apt #{{ $presc->id }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('prescription.appointment', $presc->id) }}" class="btn btn-sm btn-success rounded-3 px-3"><i class="fas fa-plus"></i> Prescribe</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr><td colspan="2" class="text-center py-4 text-muted">No approved appointments.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="patient">
                <div class="card custom-card">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h5 class="fw-bold mb-0"><i class="fas fa-bed text-primary me-2"></i> Admitted Patients</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            @forelse ($patientlist as $pat)
                                <div class="col-md-4 col-lg-3">
                                    <div class="card border rounded-3 text-center p-3 h-100 transition-hover">
                                        <img src="{{ asset('uploaded_images/' . $pat->patientpicture) }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($pat->patientname) }}&background=random'" class="rounded-circle mx-auto mb-3" width="80" height="80" style="object-fit:cover;">
                                        <h6 class="fw-bold mb-1">{{ $pat->patientname }}</h6>
                                        <span class="badge bg-light text-dark border">Apt #{{ $pat->id }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-4 text-muted">No admitted patients.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
    </script>
</body>
</html>
