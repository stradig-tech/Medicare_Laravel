<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details & Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Outfit', sans-serif;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .doctor-avatar {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .bg-pattern {
            background-color: var(--primary-color);
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            height: 120px;
            border-radius: 1rem 1rem 0 0;
            position: absolute;
            top: 0; left: 0; right: 0;
        }
    </style>
</head>
<body>

<div class="container mb-5">
    <!-- Navigation row -->
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('patient/dashboard') }}" class="btn btn-light rounded-pill px-4 shadow-sm fw-medium">
                <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
            </a>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible bg-white border-0 shadow-sm border-start border-success border-4 fade show" role="alert">
            <i class="fas fa-check-circle text-success me-2 text-primary"></i> <strong>Success!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if (Session::has('fail'))
        <div class="alert alert-danger alert-dismissible bg-white border-0 shadow-sm border-start border-danger border-4 fade show" role="alert">
            <i class="fas fa-exclamation-circle text-danger me-2"></i> <strong>Error!</strong> {{ Session::get('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- DOCTOR PROFILE SIDE -->
        <div class="col-lg-5">
            <div class="glass-panel position-relative mt-0 border-0 h-100 overflow-hidden animate-float" style="animation-delay: 0.1s;">
                <div class="bg-pattern"></div>
                <div class="card-body p-4 pt-5 text-center position-relative mt-5">
                    
                    <img src="{{ asset('uploaded_images/' . $doctor->picture) }}" 
                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctor->firstname . ' ' . $doctor->lastname) }}&background=EBF4FF&color=1a56db&size=300'" 
                         class="doctor-avatar mb-4 bg-white" alt="Doctor Picture">

                    <h3 class="fw-bold text-dark mb-1">Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h3>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 mb-4 d-inline-block fw-medium">
                        <i class="fas fa-stethoscope me-1"></i> {{ $doctor->specialization }}
                    </span>

                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <div class="text-center">
                            <h5 class="fw-bold text-dark mb-0"><i class="fas fa-award text-warning"></i></h5>
                            <span class="text-secondary small">{{ $doctor->qualification }}</span>
                        </div>
                        <div class="border-end"></div>
                        <div class="text-center">
                            <h5 class="fw-bold text-dark mb-0"><i class="fas fa-venus-mars text-info"></i></h5>
                            <span class="text-secondary small text-capitalize">{{ $doctor->gender }}</span>
                        </div>
                    </div>

                    <div class="bg-light rounded-4 p-3 text-start mb-0 border">
                        <p class="small text-secondary mb-2"><i class="fas fa-phone-alt me-2 text-primary"></i> <span class="fw-medium text-dark">{{ $doctor->phone }}</span></p>
                        <p class="small text-secondary mb-0"><i class="fas fa-map-marker-alt me-2 text-danger"></i> <span class="fw-medium text-dark">{{ $doctor->address }}</span></p>
                    </div>

                </div>
            </div>
        </div>

        <!-- APPOINTMENT BOOKING SIDE -->
        <div class="col-lg-7">
            <div class="glass-panel border-0 h-100 animate-float" style="animation-delay: 0.2s;">
                <div class="card-body p-5">
                    
                    <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle me-3">
                            <i class="fas fa-calendar-plus fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">Book Consultation</h3>
                            <p class="text-secondary mb-0">Select a date to schedule your appointment.</p>
                        </div>
                    </div>

                    <form action="{{ route('appointment-created') }}" method="post">
                        @csrf
                        
                        <!-- Hidden Data -->
                        <input type="hidden" name="doctorid" value="{{ $doctor->id }}">
                        <input type="hidden" name="doctorname" value="{{ $doctor->firstname }}">
                        <input type="hidden" name="specialization" value="{{ $doctor->specialization }}">
                        <input type="hidden" name="patientid" value="{{ $patient->id }}">
                        <input type="hidden" name="patientname" value="{{ $patient->firstname }}">
                        <input type="hidden" name="patientaddress" value="{{ $patient->address }}">
                        <input type="hidden" name="patientphone" value="{{ $patient->phone }}">
                        <input type="hidden" name="patientgender" value="{{ $patient->gender }}">
                        <input type="hidden" name="patientpicture" value="{{ $patient->picture }}">

                        <!-- Form Field -->
                        <div class="mb-5 mt-4">
                            <label class="form-label text-dark fw-medium mb-3 ms-1">Choose Preferred Date</label>
                            <div class="position-relative">
                                <input type="date" class="form-control form-control-lg form-control-premium text-primary fw-medium" id="appointmentdate" name="appointmentdate" required min="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="alert alert-info bg-primary bg-opacity-10 border-0 rounded-4 p-4 mb-5 d-flex gap-3">
                            <div class="pt-1">
                                <i class="fas fa-info-circle text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Important Notice</h6>
                                <p class="small text-secondary mb-0">Your request will be sent to the doctor for review. After the doctor confirms the appointment, it will appear as "APPROVED" in your history panel, and a Google Meet link will be provided prior to your schedule.</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-premium w-100 py-3 fs-5 rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-paper-plane"></i> Submit Request
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
