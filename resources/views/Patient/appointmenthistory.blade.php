<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment History | Medic Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8f9fa; padding: 2rem; }
        .table-custom { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table-custom thead th { background: var(--primary-color); color: white; border: none; padding: 15px; font-weight: 500; letter-spacing: 0.5px; }
        .table-custom tbody td { padding: 15px; vertical-align: middle; border-color: #f1f5f9; }
        .status-badge { padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; letter-spacing: 0.5px; }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Appointment History</h2>
            <p class="text-secondary mb-0">Track all your past and upcoming consultations.</p>
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
                        <th class="ps-4">Apt ID</th>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Date Scheduled</th>
                        <th>Patient Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointment as $apt)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $apt->id }}</td>
                            <td class="fw-medium text-dark"><i class="fas fa-user-md text-primary me-2"></i> {{ $apt->doctorname }}</td>
                            <td><span class="badge bg-light text-primary border border-primary border-opacity-25">{{ $apt->specialization }}</span></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded me-2"><i class="fas fa-calendar-alt text-primary"></i></div>
                                    <span class="fw-medium">{{ \Carbon\Carbon::parse($apt->appointmentdate)->format('M d, Y') }}</span>
                                </div>
                            </td>
                            <td class="text-secondary">{{ $patient->phone }}</td>
                            <td>
                                @if ($apt->appointmentstatus == 0)
                                    <span class="status-badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25"><i class="fas fa-clock me-1"></i> PENDING</span>
                                @else
                                    <span class="status-badge bg-success bg-opacity-10 text-success border border-success border-opacity-25"><i class="fas fa-check-circle me-1"></i> APPROVED</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-secondary">
                                <i class="fas fa-calendar-times fs-1 text-muted mb-3 d-block opacity-50"></i>
                                You have no appointment history.
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
