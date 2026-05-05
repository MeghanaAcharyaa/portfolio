@extends('layouts.app')

@section('title', 'Contact — Meghana Acharya')

@section('content')
  <div class="page-hero">
    <div class="container">
      <span class="section-label">Say Hello</span>
      <h1 style="font-size:clamp(2.2rem,5vw,3.8rem);margin-top:0.5rem;">Get In <em>Touch</em></h1>
      <p style="color:var(--text-muted);max-width:480px;margin:1rem auto 0;">
        Have a project idea, want to collaborate, or just want to say hi? I'd love to hear from you.
      </p>
    </div>
  </div>

  <section class="contact-full">
    <div class="container">
      <div class="contact-full-inner">

        <!-- INFO -->
        <div class="reveal">
          <div class="contact-info-card">
            <h3>Contact Information</h3>

            <div class="contact-detail">
              <div class="contact-icon"><i class="fas fa-envelope"></i></div>
              <div>
                <h4>Email</h4>
                <p>{{ $profile->email ?? 'meghanaashok.cse@gmail.com' }}</p>
              </div>
            </div>

            <div class="contact-detail">
              <div class="contact-icon"><i class="fas fa-phone"></i></div>
              <div>
                <h4>Phone</h4>
                <p>{{ $profile->phone ?? '+91 9900459722' }}</p>
              </div>
            </div>

            <div class="contact-detail">
              <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
              <div>
                <h4>Location</h4>
                <p>{{ $profile->location ?? 'Udupi, Mangalore & Bangalore, Karnataka' }}</p>
              </div>
            </div>

            <div class="contact-detail">
              <div class="contact-icon"><i class="fas fa-clock"></i></div>
              <div>
                <h4>Availability</h4>
                <p>Mon – Fri, 9:00 AM – 6:00 PM IST</p>
              </div>
            </div>

            <div class="social-links">
              <h4>Find Me Online</h4>
              <div class="social-links-row">
                <a href="https://github.com/MeghanaAcharyaa" target="_blank" class="social-icon" style="background:rgba(155,107,75,0.1);border-color:rgba(155,107,75,0.2);color:var(--accent);">
                  <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/meghana-acharya-a09548289" target="_blank" class="social-icon" style="background:rgba(155,107,75,0.1);border-color:rgba(155,107,75,0.2);color:var(--accent);">
                  <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="mailto:meghanaashok.cse@gmail.com" class="social-icon" style="background:rgba(155,107,75,0.1);border-color:rgba(155,107,75,0.2);color:var(--accent);">
                  <i class="fas fa-envelope"></i>
                </a>

              </div>
            </div>
          </div>

          <!-- FAQ -->
          <div style="margin-top:1.5rem;" class="card">
            <div style="padding:1.8rem;">
              <h4 style="margin-bottom:1.2rem;font-size:1rem;">Frequently Asked</h4>
              <div style="display:flex;flex-direction:column;gap:1rem;">
                <div>
                  <p style="font-size:0.85rem;font-weight:600;color:var(--espresso);margin-bottom:0.3rem;">Are you looking for full-time opportunities?</p>
                  <p style="font-size:0.82rem;color:var(--text-muted);">Yes, I am actively looking for B.Tech Computer Science graduate roles and internships for 2026.</p>
                </div>
                <div>
                  <p style="font-size:0.85rem;font-weight:600;color:var(--espresso);margin-bottom:0.3rem;">What is your preferred work location?</p>
                  <p style="font-size:0.82rem;color:var(--text-muted);">My primary locations are Bangalore, Mangalore, and Udupi. While Bangalore is most preferred, I am open to the right opportunity across Karnataka.</p>
                </div>
                <div>
                  <p style="font-size:0.85rem;font-weight:600;color:var(--espresso);margin-bottom:0.3rem;">What technologies do you specialize in?</p>
                  <p style="font-size:0.82rem;color:var(--text-muted);">I specialize in Full Stack Web Development, focusing on Laravel, JavaScript, and modern UI/UX design.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- FORM -->
        <div class="reveal reveal-delay-2">
          <div class="contact-form">
            <h3 style="margin-bottom:0.5rem;font-size:1.6rem;">Send a Message</h3>
            <p style="font-size:0.85rem;color:var(--text-muted);margin-bottom:2rem;">Fill in the form below and I'll get back to you as soon as possible.</p>
            <form action="{{ route('contact.send') }}" method="POST">
              @csrf
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" name="fname" id="fname" placeholder="Meghana" required/>
                </div>
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" name="lname" id="lname" placeholder="Acharya"/>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="meghana@email.com" required/>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Project Inquiry / Collaboration / Other"/>
              </div>
              <div class="form-group">
                <label for="message">Your Message</label>
                <textarea name="message" id="message" placeholder="Tell me about your project, timeline, and any specific requirements..." style="min-height:160px;" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-lg" style="width:100%;justify-content:center;">
                <i class="fas fa-paper-plane"></i> Send Message
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
