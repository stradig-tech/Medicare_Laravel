{{-- Premium Navbar --}}
<nav class="navbar navbar-expand-lg fixed-top" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.3); transition: all 0.3s ease;">
    <div class="container">
        
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="{{ route('index') }}">
            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            </div>
            <span class="gradient-text">Medic Care</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 active" href="{{ url('/') }}#hero" style="color: var(--text-color);">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="{{ url('/') }}#about" style="color: var(--text-color);">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="{{ url('/') }}#timeline" style="color: var(--text-color);">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="{{ url('/') }}#doctors" style="color: var(--text-color);">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3" href="{{ url('/') }}#contactus" style="color: var(--text-color);">Contact Us</a>
                </li>
            </ul>
            
            <div class="nav-item d-flex gap-2">
                @if(Session::has('role'))
                  @if(Session::get('role') == 'admin')
                    <a class="btn btn-primary rounded-pill px-4" href="{{ route('admin/dashboard') }}">Dashboard</a>
                  @elseif(Session::get('role') == 'doctor')
                    <a class="btn btn-primary rounded-pill px-4" href="{{ route('doctor.dashboard', Session::get('doctor_id')) }}">Dashboard</a>
                  @elseif(Session::get('role') == 'patient')
                    <a class="btn btn-primary rounded-pill px-4" href="{{ route('patient/dashboard') }}">Dashboard</a>
                  @endif
                  
                  <form action="{{ route('logout') }}" method="GET" class="d-inline">
                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4">Logout</button>
                  </form>
                @else
                  <a class="btn btn-outline-primary rounded-pill px-4 fw-medium" href="{{ route('login') }}">Sign In</a>
                  <a class="btn btn-primary rounded-pill px-4 fw-medium" href="{{ route('registration') }}">Get Started</a>
                @endif
            </div>
        </div>

    </div>
</nav>
