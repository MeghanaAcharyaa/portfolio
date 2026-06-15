@extends('layouts.app')

@section('title', 'Meghana Acharya — Web Developer')

@section('content')
  <!-- ═══════════════════════════════════════ HERO -->
  <section class="hero" id="home">
    <div class="hero-bg-text">Developer</div>
    <div class="hero-inner">
      <div class="hero-content">
        <div class="hero-greeting">Hello, I'm</div>
        <h1 class="hero-name">Meghana<br>Acharya</h1>
        <p class="hero-title">Web Developer</p>
        <p class="hero-desc">
          I craft clean, responsive, and user-centered web experiences — blending thoughtful design with robust code to bring ideas to life.
        </p>
        <div class="hero-actions">
          <a href="{{ route('projects') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-folder-open"></i> View Projects
          </a>
          <a href="{{ route('contact') }}" class="btn btn-outline btn-lg">
            <i class="fas fa-envelope"></i> Contact Me
          </a>
          <div style="display:inline-flex;gap:0.5rem;align-items:center;">
            <a href="{{ asset('Meghana_Acharya_Resume_2026.pdf') }}" target="_blank" class="btn btn-accent btn-sm" style="padding:0.7rem 1.2rem;">
              <i class="fas fa-eye"></i> View Resume
            </a>
            <a href="{{ asset('Meghana_Acharya_Resume_2026.pdf') }}" download class="btn btn-outline btn-sm" style="padding:0.7rem 1.2rem;">
              <i class="fas fa-download"></i> Download
            </a>
          </div>
        </div>
      </div>
      <div class="hero-image-wrap">
        <div class="hero-image-frame">
          @if($profile && $profile->photo_hero)
          <div class="hero-image-placeholder" style="background:url('{{ asset('storage/'.$profile->photo_hero) }}');background-size:cover;background-position:center;border:none;"></div>
          @else
          <img src="{{ asset('assets/images/profile.jpg') }}" alt="Meghana Acharya" class="hero-image">
          @endif
          <div class="hero-badge">
            <div class="hero-badge-num"><i class="fas fa-graduation-cap"></i></div>
            <div class="hero-badge-text">Computer Science Student</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════ ABOUT PREVIEW -->
  <section class="about-preview" id="about">
    <div class="container">
      <div class="about-preview-inner">
        <div class="about-preview-img reveal">
          <div class="img-box" style="{{ ($profile && $profile->photo_about) ? 'background:url('.asset('storage/'.$profile->photo_about).');background-size:cover;background-position:center;' : '' }}">
            @if(!($profile && $profile->photo_about))
            <i class="fas fa-laptop-code"></i>
            @endif
          </div>
          <div class="about-stats">
            <div class="stat-item">
              <div class="stat-num" data-count="12">12</div>
              <div class="stat-label">Projects Done</div>
            </div>
            <div class="stat-item">
              <div class="stat-num" data-count="6">6</div>
              <div class="stat-label">Technologies</div>
            </div>
            <div class="stat-item">
              <div class="stat-num" data-count="5">5</div>
              <div class="stat-label">Certificates</div>
            </div>
            <div class="stat-item">
              <div class="stat-num">6</div>
              <div class="stat-label">Months Experience</div>
            </div>
          </div>
        </div>
        <div class="about-content reveal reveal-delay-2">
          <span class="section-label">About Me</span>
          <h2 class="section-title">Passionate about crafting <em>digital experiences</em></h2>
          <p>
            {{ $profile->who_i_am ?? 'I am a dedicated Web Developer with a strong foundation in both front-end and back-end technologies.' }}
          </p>
          <div style="margin-top:2rem;">
            <a href="{{ route('about') }}" class="btn btn-primary">Read More <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════ SKILLS PREVIEW -->
  <section class="skills-preview" id="skills">
    <div class="container">
      <div class="text-center reveal">
        <span class="section-label" style="justify-content:center;">What I Know</span>
        <h2 class="section-title">My <em>Core Skills</em></h2>
        <p style="max-width:520px;margin:0 auto;color:var(--text-muted);">
          A curated toolkit of technologies I use to build modern, performant web applications.
        </p>
      </div>
      <div class="skills-grid">
        @forelse($skills->take(6) as $index => $skill)
        <div class="skill-card card reveal" style="transition-delay: {{ $index * 0.1 }}s;">
          <div class="skill-icon"><i class="{{ $skill->icon }}"></i></div>
          <h4>{{ $skill->name }}</h4>
          <p>{{ $skill->description }}</p>
        </div>
        @empty
        <p style="grid-column: 1/-1; text-align: center; color: var(--text-muted);">No skills added yet.</p>
        @endforelse
      </div>
      <div class="section-cta">
        <a href="{{ route('skills') }}" class="btn btn-outline">View All Skills <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════ PROJECTS PREVIEW -->
  <section class="projects-preview" id="projects">
    <div class="container">
      <div class="text-center reveal">
        <span class="section-label" style="justify-content:center;">Featured Work</span>
        <h2 class="section-title">Recent <em>Projects</em></h2>
        <p style="max-width:480px;margin:0 auto;color:var(--text-muted);">
          A selection of projects that showcase my skills and creative approach to problem-solving.
        </p>
      </div>
      <div class="projects-grid mt-4">
        @forelse($projects as $index => $project)
        <div class="project-card card reveal" style="transition-delay: {{ $index * 0.1 }}s;">
          <div class="project-card-img" style="{{ $project->image_path ? 'background:url('.asset('storage/'.$project->image_path).');background-size:cover;background-position:center;' : 'background:linear-gradient(135deg,#E8E0D5,#C4A882);' }}">
            @if(!$project->image_path)
            <i class="fas fa-code"></i>
            @endif
            <span class="proj-num">0{{ $index + 1 }}</span>
          </div>
          <div class="project-card-body">
            <h3>{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
            <div class="project-tags">
              @foreach(explode(',', $project->tags) as $tag)
              <span class="tag">{{ trim($tag) }}</span>
              @endforeach
            </div>
            <div class="project-links">
              <a href="{{ $project->link ?? route('projects') }}" class="btn btn-sm btn-primary">View Details</a>
            </div>
          </div>
        </div>
        @empty
        <p style="grid-column: 1/-1; text-align: center; color: var(--text-muted);">No projects featured yet.</p>
        @endforelse
      </div>
      <div class="section-cta">
        <a href="{{ route('projects') }}" class="btn btn-outline">View All Projects <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════ EDUCATION -->
  <section class="education" id="education">
    <div class="container">
      <div class="reveal">
        <span class="section-label">My Journey</span>
        <h2 class="section-title">Education <em>Timeline</em></h2>
      </div>
      <div class="timeline">
        @forelse($education as $index => $item)
        <div class="timeline-item reveal" style="transition-delay: {{ $index * 0.1 }}s;">
          <div class="timeline-year">{{ $item->year }}</div>
          <div class="timeline-card">
            <h4>{{ $item->degree }}</h4>
            <p class="institution">{{ $item->institution }}</p>
            <p>{{ $item->description }}</p>
          </div>
        </div>
        @empty
        <p style="text-align:center;color:var(--text-muted);">No education records found.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════ CERTIFICATES -->
  <section class="certificates" id="certificates">
    <div class="container">
      <div class="text-center reveal">
        <span class="section-label" style="justify-content:center;">Achievements</span>
        <h2 class="section-title">Certificates &amp; <em>Credentials</em></h2>
      </div>
      <div class="cert-grid mt-4">
        @forelse($certificates as $index => $cert)
        <div class="cert-card card reveal" style="transition-delay: {{ $index * 0.05 }}s;">
          <div class="cert-img" style="background: {{ $cert->photo ? 'none' : 'linear-gradient(135deg,#E8E0D5,#C4A882)' }};">
            @if($cert->photo)
              <img src="{{ asset($cert->photo) }}" alt="{{ $cert->title }}" style="width:100%; height:100%; object-fit: cover;">
            @else
              <i class="{{ $cert->icon }}"></i>
            @endif
          </div>
          <div class="cert-body">
            <h4>{{ $cert->title }}</h4>
            <span>{{ $cert->issuer }} · {{ $cert->year }}</span>
          </div>
        </div>
        @empty
        <p style="grid-column: 1/-1; text-align: center; color: var(--text-muted);">No certificates added yet.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════ CONTACT -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="contact-inner">
        <div class="reveal">
          <span class="section-label">Say Hello</span>
          <h2 class="section-title">Let's <em>Work Together</em></h2>
          <p style="color:var(--text-muted);margin-bottom:2rem;">
            Have a project in mind or just want to chat? I'd love to hear from you. Fill out the form and I'll get back to you soon.
          </p>
          <div class="contact-detail">
            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
            <div>
              <h4>Email</h4>
              <p>{{ $profile->email ?? 'meghanaashok.cse@gmail.com' }}</p>
            </div>
          </div>
          <div class="contact-detail">
            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div>
              <h4>Location</h4>
              <p>{{ $profile->location ?? 'Udupi, Karnataka, India' }}</p>
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
            <div class="contact-icon"><i class="fas fa-clock"></i></div>
            <div>
              <h4>Availability</h4>
              <p>Mon – Fri, 9:00 AM – 6:00 PM IST</p>
            </div>
          </div>
        </div>
        <div class="reveal reveal-delay-2">
          <div class="contact-form">
            <form data-contact action="{{ route('contact.send') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="fname" id="name" placeholder="Meghana Acharya" required/>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="meghana@email.com" required/>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" placeholder="Tell me about your project..." required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                <i class="fas fa-paper-plane"></i> Send Message
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
