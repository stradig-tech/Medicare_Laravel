<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Include the premium CSS design system -->
    <link rel="stylesheet" href="{{ asset('assets/css/premium.css') }}">
    <title>Select Registration Type | Medic Care</title>
</head>

<body class="bg-mesh">
    <div class="h-100 d-flex justify-content-center align-items-center min-vh-100">
        <div class="glass-panel w-100 p-5 text-center" style="max-width: 500px; border-radius: 20px;">
            <div class="mb-5">
                <div class="d-inline-block p-3 rounded-circle" style="background: rgba(var(--primary-color-rgb), 0.1);">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h1 class="h2 mt-4 font-weight-bold" style="font-family: 'Outfit', sans-serif;">Welcome to <span class="gradient-text font-weight-bold">Medic Care</span></h1>
                <p class="text-secondary mt-2">Select your account type to get started</p>
            </div>

            <div class="d-grid gap-3">
                <a href="{{ route('Patient-registration') }}" class="btn btn-primary d-flex align-items-center justify-content-between p-3 position-relative overflow-hidden group">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <span class="fs-5 fw-medium">Register as Patient</span>
                    </div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-75"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                
                <a href="{{ route('Doctor-registration') }}" class="btn btn-outline-primary d-flex align-items-center justify-content-between p-3 border-2">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                        <span class="fs-5 fw-medium">Register as Doctor</span>
                    </div>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-75"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            
            <div class="mt-4 text-center">
                <a href="{{ route('index') }}" class="text-decoration-none text-secondary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</body>

</html>
