<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Medic Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8f9fa; padding: 2rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Edit Profile</h2>
                    <p class="text-secondary mb-0">Update your personal and contact details.</p>
                </div>
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 fw-medium" onclick="history.back()">
                    Cancel
                </button>
            </div>

            <div class="glass-panel border-0 p-5 animate-float h-100">
                <form action="{{ route('patientprofile.update', $patient->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark ms-1">First Name</label>
                            <input type="text" class="form-control form-control-lg form-control-premium text-primary fw-medium" name="firstname" value="{{ $patient->firstname }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark ms-1">Last Name</label>
                            <input type="text" class="form-control form-control-lg form-control-premium text-primary fw-medium" name="lastname" value="{{ $patient->lastname }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark ms-1">Phone Number</label>
                            <input type="text" class="form-control form-control-lg form-control-premium text-primary fw-medium" name="phone" value="{{ $patient->phone }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium text-dark ms-1">National ID (NID)</label>
                            <input type="text" class="form-control form-control-lg form-control-premium text-primary fw-medium" name="nid" value="{{ $patient->nid }}" required>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label fw-medium text-dark ms-1">Date of Birth</label>
                            <input type="date" class="form-control form-control-lg form-control-premium text-primary fw-medium" name="dob" value="{{ $patient->dob }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-medium text-dark ms-1">Home Address</label>
                            <input type="text" class="form-control form-control-lg form-control-premium text-primary fw-medium" name="address" value="{{ $patient->address }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-medium text-dark ms-1">Profile Picture</label>
                            <input type="file" class="form-control form-control-lg form-control-premium text-primary fw-medium bg-white" name="picture" required>
                            <div class="form-text mt-2"><i class="fas fa-info-circle me-1"></i> Please upload a recent photo (JPG, PNG).</div>
                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" class="btn-premium w-100 py-3 fs-5 rounded-pill shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
