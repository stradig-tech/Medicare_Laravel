@extends('layouts.app')

@section('content')
<style>
    /* Hero Section Specifics to integrate with Premium CSS */
    .hero-section {
        padding-top: 120px;
        padding-bottom: 80px;
        position: relative;
        overflow: hidden;
    }
    
    .blob-shape {
        position: absolute;
        width: 600px;
        height: 600px;
        background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.2), rgba(var(--bs-info-rgb), 0.2));
        filter: blur(80px);
        border-radius: 50%;
        z-index: -1;
    }
    
    .blob-1 { top: -100px; right: -100px; }
    .blob-2 { bottom: -200px; left: -200px; }
    
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover);
    }
    
    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        margin-bottom: 1.5rem;
    }
    
    .doctor-pic {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
</style>

<div class="hero-section" id="hero">
    <div class="blob-shape blob-1"></div>
    <div class="blob-shape blob-2"></div>
    
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Modern Healthcare</span>
                <h1 class="display-3 fw-bold mb-4">
                    Better <br />
                    <span class="gradient-text">Health & Lives</span>
                </h1>
                <p class="lead text-secondary mb-5 pe-lg-5">
                    Medic Care is a leading healthcare provider committed to delivering quality medical care to patients in a compassionate and personalized manner.
                </p>
                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn btn-primary rounded-pill px-5 py-3 fw-medium animate-float">Learn More</a>
                    <a href="#contactus" class="btn btn-outline-primary rounded-pill px-5 py-3 fw-medium bg-white">Book Appointment</a>
                </div>
            </div>
            
            <div class="col-lg-6">
                <!-- Image Grid placeholder -->
                <div class="row g-3">
                    <div class="col-6 mt-5">
                        <img src="{{ asset('assets/images/gallery/female-doctor-with-presenting-hand-gesture.jpg') }}" class="img-fluid rounded-4 shadow-lg mb-3" alt="Doctor" style="height: 300px; object-fit: cover; width: 100%;">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/images/slider/doctor-s-hand-holding-stethoscope-closeup.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="Healthcare" style="height: 350px; object-fit: cover; width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5 bg-white" id="features">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose Us</h2>
            <p class="text-secondary max-w-2xl mx-auto">Providing advanced, compassionate care for you and your family.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100 p-4">
                    <div class="icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    </div>
                    <h4 class="fw-bold mb-3">Expert Doctors</h4>
                    <p class="text-secondary mb-0">Our team consists of highly qualified professionals with years of experience.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card h-100 p-4">
                    <div class="icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <h4 class="fw-bold mb-3">Easy Scheduling</h4>
                    <p class="text-secondary mb-0">Book appointments online anytime. Manage your health schedule with ease.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card feature-card h-100 p-4">
                    <div class="icon-box">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h4 class="fw-bold mb-3">Secure Records</h4>
                    <p class="text-secondary mb-0">Your medical history is protected with enterprise-grade security.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="about">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="position-relative">
                    <div class="bg-primary rounded-circle position-absolute top-50 start-50 translate-middle opacity-10" style="width: 120%; height: 120%; z-index: -1;"></div>
                    <img src="{{ asset('assets/images/gallery/medium-shot-man-getting-vaccine.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="About Clinic">
                    
                    <div class="position-absolute bottom-0 end-0 bg-white p-4 rounded-4 shadow-lg m-n3 w-50">
                        <h3 class="gradient-text fw-bold mb-0 text-center display-5">12+</h3>
                        <p class="text-secondary text-center mb-0 fw-medium">Years Experience</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 ms-auto">
                <h2 class="fw-bold mb-4">Dedicated to Your Health & Well-being</h2>
                <p class="text-secondary fs-5 mb-4">
                    Protect yourself and others by wearing masks and washing hands frequently. Outdoor is safer than indoor for gatherings or holding events. Let us all strive to cultivate kindness and empathy in our daily lives.
                </p>
                <p class="text-secondary mb-4">
                    People who get sick with Coronavirus disease (COVID-19) will experience mild to moderate symptoms and recover without special treatments.
                </p>
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div>
                        <small class="text-secondary fw-bold text-uppercase tracking-wider">Call for Checkup</small>
                        <h4 class="mb-0 fw-bold">01632103754</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline / Services Block -->
<section class="py-5 bg-white" id="timeline">
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5">Our Services</h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="glass-panel p-4 mb-4 d-flex align-items-center flex-column flex-md-row gap-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; flex-shrink: 0;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
                    </div>
                    <div>
                        <h4 class="fw-bold">Get the Vaccine</h4>
                        <p class="text-secondary mb-0">Getting the vaccine is one of the most effective ways to protect yourself. Vaccines have undergone rigorous testing and have been proven safe.</p>
                    </div>
                </div>

                <div class="glass-panel p-4 mb-4 d-flex align-items-center flex-column flex-md-row gap-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; flex-shrink: 0;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                    </div>
                    <div>
                        <h4 class="fw-bold">Consulting your health</h4>
                        <p class="text-secondary mb-0">Regular health check-ups can help identify underlying health concerns before they develop into more serious conditions.</p>
                    </div>
                </div>

                <div class="glass-panel p-4 mb-4 d-flex align-items-center flex-column flex-md-row gap-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; flex-shrink: 0;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                    </div>
                    <div>
                        <h4 class="fw-bold">Certified Nurses</h4>
                        <p class="text-secondary mb-0">Our certified nurses provide high-quality and compassionate care to patients, ensuring safe and effective treatment.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Doctors -->
<section class="py-5" id="doctors">
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5">Our Specialists</h2>
        
        <div class="row g-4 justify-content-center">
            @forelse ($doctors as $doctor)
                <div class="col-md-6 col-lg-4">
                    <div class="glass-panel text-center p-4 h-100">
                        <img src="{{ asset('uploaded_images/' . $doctor->picture) }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($doctor->firstname . ' ' . $doctor->lastname) }}&background=random'" class="doctor-pic mb-4" alt="Dr. {{ $doctor->firstname }}">
                        <h4 class="fw-bold mb-1">Dr. {{ $doctor->firstname }} {{ $doctor->lastname }}</h4>
                        <p class="text-primary fw-medium mb-3">{{ $doctor->specialization }}</p>
                        <hr class="w-25 mx-auto mb-3 opacity-25">
                        <p class="text-secondary small mb-4">
                            Hi! I am a Specialized {{ $doctor->specialization }} with {{ $doctor->qualification }} qualifications. Hope you'll have a great experience.
                        </p>
                        @if(Session::has('role'))
                            @if(Session::get('role') == 'patient')
                                <a href="{{ route('patient/dashboard') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">Book Now</a>
                            @else
                                <a href="{{ Session::get('role') == 'doctor' ? route('doctor.dashboard', Session::get('doctor_id')) : route('admin/dashboard') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">Dashboard</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">Login to Book</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary py-5">
                    No doctors available at the moment.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Contact -->
<section class="py-5 bg-white" id="contactus">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-panel p-5 shadow-lg border-0" style="background: linear-gradient(135deg, #ffffff, #fdfbfb);">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Get In Touch</h2>
                        <p class="text-secondary">Have questions? Send us a message and we'll reply shortly.</p>
                    </div>
                    
                    <form action="{{ route('contact.us') }}" method="post">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="text" name="name" id="name" class="form-control bg-transparent" placeholder="Full name" required>
                                    <label for="name">Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="email" name="email" id="email" class="form-control bg-transparent" placeholder="Email address" required>
                                    <label for="email">Email Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="text" name="phone" id="phone" class="form-control bg-transparent" placeholder="Phone" required>
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating group">
                                    <input type="date" name="date" id="date" class="form-control bg-transparent" required>
                                    <label for="date">Preferred Date</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating group">
                                    <textarea name="message" id="message" class="form-control bg-transparent" style="height: 120px" placeholder="Message" required></textarea>
                                    <label for="message">Your Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-medium">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5" id="contact">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-4 pe-lg-5">
                <h3 class="fw-bold text-white mb-4">Medic Care</h3>
                <p class="text-white-50 mb-4">A leading healthcare provider committed to delivering quality medical care to patients in a compassionate and personalized manner.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a>
                    <a href="#" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a>
                </div>
            </div>
            
            <div class="col-lg-4">
                <h5 class="fw-bold text-white mb-4">Opening Hours</h5>
                <ul class="list-unstyled text-white-50 leading-loose">
                    <li class="d-flex justify-content-between mb-2"><span>Monday - Friday</span> <span>8:00 AM - 3:30 PM</span></li>
                    <li class="d-flex justify-content-between mb-2"><span>Saturday</span> <span>10:30 AM - 5:30 PM</span></li>
                    <li class="d-flex justify-content-between text-danger fw-medium"><span>Sunday</span> <span>Closed</span></li>
                </ul>
            </div>
            
            <div class="col-lg-4">
                <h5 class="fw-bold text-white mb-4">Contact Info</h5>
                <ul class="list-unstyled text-white-50">
                    <li class="d-flex align-items-center mb-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        01632103754
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        muhtadinmushfiq@gmail.com
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3 mt-1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        123 Digital Art Street,<br>San Diego, CA 92123
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="border-secondary my-4">
        
        <div class="text-center text-white-50">
            <small>&copy; {{ date('Y') }} Medic Care. Designed with modern aesthetics.</small>
        </div>
    </div>
</footer>

@endsection
