<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Prescriptions | Medic Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8f9fa; padding: 2rem; }
        .table-custom { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table-custom thead th { background: #3b82f6; color: white; border: none; padding: 15px; font-weight: 500; letter-spacing: 0.5px; }
        .table-custom tbody td { padding: 15px; vertical-align: middle; border-color: #f1f5f9; }
        .img-avatar { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 2px solid #e2e8f0; }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">My Prescriptions</h2>
            <p class="text-secondary mb-0">Download and view your digital medical prescriptions.</p>
        </div>
        <a href="{{ route('patient/dashboard') }}" class="btn btn-outline-primary rounded-pill px-4 fw-medium">
            <i class="fas fa-arrow-left me-2"></i> Dashboard
        </a>
    </div>

    <div class="glass-panel border-0 p-0 table-custom animate-float">
        <div class="table-responsive">
            <table class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th class="ps-4">Patient Profile</th>
                        <th>Prescribing Doctor</th>
                        <th>Appointment Reference</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prescription as $presc)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ asset('uploaded_images/' . $presc->patientpicture) }}" class="img-avatar shadow-sm" alt="Patient Image" onerror="this.src='https://ui-avatars.com/api/?name=Patient&background=random'">
                            </td>
                            <td class="fw-medium text-dark"><i class="fas fa-stethoscope text-primary me-2"></i> {{ $presc->doctorname }}</td>
                            <td><span class="badge bg-light text-secondary border border-secondary border-opacity-25">APT-{{ str_pad($presc->appointmentid, 4, '0', STR_PAD_LEFT) }}</span></td>
                            <td>
                                <a href="{{ route('prescriptions.download', $presc->id) }}" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm d-inline-flex align-items-center">
                                    <i class="fas fa-download me-2"></i> Download PDF
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-secondary">
                                <i class="fas fa-prescription-bottle-alt fs-1 text-muted mb-3 d-block opacity-50"></i>
                                You have no prescriptions generated yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
