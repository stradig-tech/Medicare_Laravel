<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard | Medic Care</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">
    
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #f8f9fa; }
        .sidebar { background: linear-gradient(180deg, var(--secondary-color) 0%, #1a1a2e 100%); min-height: 100vh; position: fixed; top: 0; left: 0; width: 250px; z-index: 1000; transition: all 0.3s; }
        .main-content { margin-left: 250px; padding: 20px; transition: all 0.3s; }
        .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; font-weight: 500; transition: all 0.2s; display: flex; align-items: center; gap: 10px; margin-bottom: 5px; }
        .nav-link:hover, .nav-link.active { color: #fff; background: rgba(255,255,255,0.1); text-decoration: none; border-radius: 8px; margin-left: 10px; margin-right: 10px; }
        .custom-card { border: none; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s; height: 100%; display: flex; flex-direction: column; }
        .custom-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .action-card { background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(248,249,250,1) 100%); cursor: pointer; text-decoration: none; border: 1px solid rgba(0,0,0,0.05); }
        .action-icon-wrapper { width: 80px; height: 80px; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 20px auto; }
        
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
            <div class="bg-white rounded-circle p-2 d-flex align-items-center justify-content-center text-secondary" style="width: 40px; height: 40px;">
                <i class="fas fa-shield-alt fs-5"></i>
            </div>
            <h4 class="mb-0 fw-bold text-white tracking-wider">Medic Care</h4>
        </div>
        
        <hr class="border-white opacity-25 mx-3 mt-0">
        
        <div class="px-3 pb-3">
            <div class="d-flex align-items-center gap-3 mb-4 mt-2 px-2">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold fs-5 border border-2 border-white" style="width: 45px; height: 45px;">
                    A
                </div>
                <div>
                    <h6 class="mb-0 text-white fw-bold">Adminstrator</h6>
                    <small class="text-info fw-medium">Super Admin</small>
                </div>
            </div>
        </div>

        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-chart-line w-20px text-center"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#appointment" class="nav-link">
                    <i class="fas fa-calendar-check w-20px text-center"></i> Appointments
                </a>
            </li>
            <li class="nav-item">
                <a href="#doctor" class="nav-link">
                    <i class="fas fa-user-md w-20px text-center"></i> Doctors
                </a>
            </li>
            <li class="nav-item">
                <a href="#patient" class="nav-link">
                    <i class="fas fa-users w-20px text-center"></i> Patients
                </a>
            </li>
            <li class="nav-item">
                <a href="#package" class="nav-link">
                    <i class="fas fa-box w-20px text-center"></i> Packages
                </a>
            </li>
            <li class="nav-item">
                <a href="#earning" class="nav-link">
                    <i class="fas fa-wallet w-20px text-center"></i> Earnings
                </a>
            </li>
            <li class="nav-item">
                <a href="#contact" class="nav-link">
                    <i class="fas fa-envelope w-20px text-center"></i> Contacts
                </a>
            </li>
        </ul>
        
        <div class="position-absolute bottom-0 w-100 p-3">
            <a href="{{ route('create.admin') }}" class="btn btn-outline-light w-100 mb-2 rounded-3 text-start fw-medium"><i class="fas fa-user-plus me-2"></i> New Admin</a>
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
                <h4 class="mb-0 fw-bold text-dark">System Overview</h4>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill fw-medium tracking-wider text-uppercase">Admin Mode</span>
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
        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-4 position-relative">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-semibold text-uppercase mb-0 tracking-wider">Total Earnings</h6>
                            <div class="bg-primary bg-opacity-10 text-primary rounded-2 p-2">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">${{ $totalprice }}</h2>
                        <div class="position-absolute bottom-0 start-0 w-100 bg-primary" style="height: 4px;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-4 position-relative">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-semibold text-uppercase mb-0 tracking-wider">Total Doctors</h6>
                            <div class="bg-success bg-opacity-10 text-success rounded-2 p-2">
                                <i class="fas fa-user-md"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $totaldoctor }}</h2>
                        <div class="position-absolute bottom-0 start-0 w-100 bg-success" style="height: 4px;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-4 position-relative">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-semibold text-uppercase mb-0 tracking-wider">Total Patients</h6>
                            <div class="bg-info bg-opacity-10 text-info rounded-2 p-2">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $totalpatient }}</h2>
                        <div class="position-absolute bottom-0 start-0 w-100 bg-info" style="height: 4px;"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body p-4 position-relative">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted fw-semibold text-uppercase mb-0 tracking-wider">Appointments</h6>
                            <div class="bg-warning bg-opacity-10 text-warning rounded-2 p-2" style="color: #fd7e14 !important;">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-0">{{ $totalappointment }}</h2>
                        <div class="position-absolute bottom-0 start-0 w-100 bg-warning" style="height: 4px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Actions Grid -->
        <h5 class="fw-bold mb-4">Management Modules</h5>
        <div class="row g-4 pb-4">
            
            <!-- Packages Module -->
            <div class="col-xl-4 col-md-6" id="package">
                <a href="{{ route('ViewpackageGet') }}" class="card custom-card action-card p-5 text-center text-dark">
                    <div class="action-icon-wrapper bg-primary bg-opacity-10 text-primary mx-auto">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Packages Settings</h4>
                    <p class="text-muted small mb-0">Create, update, or remove healthcare packages available to patients.</p>
                </a>
            </div>

            <!-- Earnings Module -->
            <div class="col-xl-4 col-md-6" id="earning">
                <a href="{{ route('earning.history') }}" class="card custom-card action-card p-5 text-center text-dark">
                    <div class="action-icon-wrapper bg-success bg-opacity-10 text-success mx-auto">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Financial Reports</h4>
                    <p class="text-muted small mb-0">View detailed earnings history and transaction logs across platform.</p>
                </a>
            </div>

            <!-- Patients Module -->
            <div class="col-xl-4 col-md-6" id="patient">
                <a href="{{ route('show.patient') }}" class="card custom-card action-card p-5 text-center text-dark">
                    <div class="action-icon-wrapper bg-info bg-opacity-10 text-info mx-auto">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Patient Directory</h4>
                    <p class="text-muted small mb-0">Manage registered patients and view comprehensive user details.</p>
                </a>
            </div>

            <!-- Doctors Module -->
            <div class="col-xl-4 col-md-6" id="doctor">
                <a href="{{ route('show.doctor') }}" class="card custom-card action-card p-5 text-center text-dark">
                    <div class="action-icon-wrapper bg-warning bg-opacity-10 text-warning mx-auto" style="color: #fd7e14 !important;">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Doctor Management</h4>
                    <p class="text-muted small mb-0">Review doctor profiles, verify qualifications and manage staff.</p>
                </a>
            </div>

            <!-- Appointments Module -->
            <div class="col-xl-4 col-md-6" id="appointment">
                <a href="{{ route('show.appointment') }}" class="card custom-card action-card p-5 text-center text-dark">
                    <div class="action-icon-wrapper bg-danger bg-opacity-10 text-danger mx-auto">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h4 class="fw-bold mb-2">All Appointments</h4>
                    <p class="text-muted small mb-0">Oversee all platform appointments between doctors and patients.</p>
                </a>
            </div>

            <!-- Contacts Module -->
            <div class="col-xl-4 col-md-6" id="contact">
                <a href="{{ route('show.contact') }}" class="card custom-card action-card p-5 text-center text-dark">
                    <div class="action-icon-wrapper bg-secondary bg-opacity-10 text-secondary mx-auto">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Support Messages</h4>
                    <p class="text-muted small mb-0">Read and respond to inquiries submitted via the website contact form.</p>
                </a>
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
