<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Messages & Links | Medic Care</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/premium.css') }}" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background: #f8f9fa; padding: 2rem; }
        .table-custom { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .table-custom thead th { background: #8b5cf6; color: white; border: none; padding: 15px; font-weight: 500; letter-spacing: 0.5px; }
        .table-custom tbody td { padding: 15px; vertical-align: middle; border-color: #f1f5f9; }
        .img-avatar { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 2px solid #e2e8f0; }
        .meet-link { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; padding: 8px 15px; border-radius: 8px; font-family: monospace; display: inline-block; word-break: break-all; }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">My Messages</h2>
            <p class="text-secondary mb-0">View messages and digital consultation links from your doctors.</p>
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
                        <th class="ps-4">Doctor</th>
                        <th>Doctor Name</th>
                        <th>Appointment Ref</th>
                        <th>Message / Meeting Link</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patientmsg as $msg)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ asset('uploaded_images/' . $msg->doctorpicture) }}" class="img-avatar shadow-sm" alt="Doctor Image" onerror="this.src='https://ui-avatars.com/api/?name=Doctor&background=random'">
                            </td>
                            <td class="fw-medium text-dark">{{ $msg->doctorname }}</td>
                            <td><span class="badge bg-light text-secondary border border-secondary border-opacity-25">APT-{{ str_pad($msg->appointmentid, 4, '0', STR_PAD_LEFT) }}</span></td>
                            <td style="max-width: 350px;">
                                @if(str_contains($msg->message, 'http'))
                                    <a href="{{ $msg->message }}" target="_blank" class="meet-link text-decoration-none">
                                        <i class="fas fa-video me-2"></i> {{ $msg->message }}
                                    </a>
                                @else
                                    <div class="bg-light p-3 rounded-3 text-secondary small border">
                                        {{ $msg->message }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-secondary">
                                <i class="fas fa-envelope-open-text fs-1 text-muted mb-3 d-block opacity-50"></i>
                                You have no new messages or meeting links.
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
