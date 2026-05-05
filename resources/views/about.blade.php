@extends('layouts.app')

@section('title', 'About — Meghana Acharya')

@section('content')
  <!-- PAGE HERO -->
  <div class="page-hero">
    <div class="container">
      <span class="section-label">Get to Know Me</span>
      <h1 style="font-size:clamp(2.2rem,5vw,3.8rem);margin-top:0.5rem;">About <em>Me</em></h1>
      <p style="color:var(--text-muted);max-width:480px;margin:1rem auto 0;">
        A passionate developer crafting elegant web experiences from Udupi, India.
      </p>
    </div>
  </div>

  <!-- ABOUT FULL -->
  <section class="about-full">
    <div class="container">
      <div class="about-full-inner">

        <!-- SIDEBAR -->
        <aside class="about-sidebar reveal">
          <div class="profile-card">
            <div class="profile-card-img" style="{{ ($profile && $profile->photo_sidebar) ? 'background:url('.asset('storage/'.$profile->photo_sidebar).');background-size:cover;background-position:center;border-radius:12px;' : '' }}">
              @if(!($profile && $profile->photo_sidebar))
              <i class="fas fa-user"></i>
              @endif
            </div>
            <div class="profile-card-info">
              <h3>Meghana Acharya</h3>
              <p class="role">Web Developer</p>
              <div class="profile-detail">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $profile->location ?? 'Udupi, Karnataka, India' }}</span>
              </div>
              <div class="profile-detail">
                <i class="fas fa-envelope"></i>
                <span>{{ $profile->email ?? 'meghanaashok.cse@gmail.com' }}</span>
              </div>
              <div class="profile-detail">
                <i class="fas fa-phone"></i>
                <span>{{ $profile->phone ?? '+91 9900459722' }}</span>
              </div>
              <div class="profile-detail">
                <i class="fas fa-graduation-cap"></i>
                <span>{{ $profile->education_short ?? 'B.E. Computer Science' }}</span>
              </div>
              <div class="profile-detail">
                <i class="fas fa-calendar"></i>
                <div style="line-height:1.2;">
                  <span>Available for Opportunities</span>
                </div>
              </div>
              <div style="margin-top:1.5rem;display:flex;flex-direction:column;gap:0.7rem;">
                <a href="{{ asset('Meghana_Acharya_Resume.pdf') }}" target="_blank" class="btn btn-primary" style="justify-content:center;">
                  <i class="fas fa-eye"></i> View Resume
                </a>
                <a href="{{ asset('Meghana_Acharya_Resume.pdf') }}" download class="btn btn-outline" style="justify-content:center;">
                  <i class="fas fa-download"></i> Download PDF
                </a>
              </div>
              <div style="margin-top:1rem;">
                <div class="social-icons" style="justify-content:center;">
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
          </div>

          <!-- Quick Skills -->
          <div style="margin-top:1.5rem;" class="card" style="padding:1.5rem;">
            <div style="padding:1.5rem;">
              <h4 style="margin-bottom:1rem;font-size:1rem;">Quick Skills</h4>
              <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
                @foreach($skills as $skill)
                <span class="tag">{{ $skill->name }}</span>
                @endforeach
              </div>
            </div>
          </div>
        </aside>

        <!-- CONTENT -->
        <main class="about-content">
          <div class="about-section reveal">
            <h3>Career Objective</h3>
            <div class="divider" style="margin:0 0 1.2rem;"></div>
            <p>
              {{ $profile->career_objective ?? 'To build scalable, user-centric applications...' }}
            </p>
          </div>

          <div class="about-section reveal">
            <h3>Who I Am</h3>
            <div class="divider" style="margin:0 0 1.2rem;"></div>
            <p>
              {{ $profile->who_i_am ?? 'I am a Web Developer based in Udupi...' }}
            </p>
          </div>

          <div class="about-section reveal">
            <h3>Learning Journey</h3>
            <div class="divider" style="margin:0 0 1.2rem;"></div>
            <p>
              {{ $profile->learning_journey ?? 'My learning has been a blend of formal education...' }}
            </p>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-top:1.5rem;">
              @php
                $categories = ['Frontend' => 'fas fa-code', 'Backend' => 'fas fa-server', 'Database' => 'fas fa-database', 'Tools' => 'fas fa-tools'];
              @endphp
              @foreach($categories as $catName => $catIcon)
              <div class="card" style="padding:1.2rem;">
                <i class="{{ $catIcon }}" style="color:var(--accent);font-size:1.2rem;margin-bottom:0.6rem;"></i>
                <h4 style="font-size:0.95rem;margin-bottom:0.3rem;">{{ $catName }}</h4>
                <p style="font-size:0.82rem;color:var(--text-muted);">
                  {{ $skills->where('category', $catName)->pluck('name')->implode(', ') }}
                </p>
              </div>
              @endforeach
            </div>
          </div>

          <div class="about-section reveal">
            <h3>What I Value</h3>
            <div class="divider" style="margin:0 0 1.2rem;"></div>
            <div style="display:flex;flex-direction:column;gap:1rem;">
              <div style="display:flex;gap:1rem;align-items:flex-start;">
                <div style="width:36px;height:36px;background:rgba(196,168,130,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                  <i class="fas fa-star" style="color:var(--accent);font-size:0.85rem;"></i>
                </div>
                <div>
                  <h4 style="font-size:0.95rem;margin-bottom:0.2rem;">Clean, Maintainable Code</h4>
                  <p style="font-size:0.85rem;color:var(--text-muted);">I write code that is readable, well-documented, and easy for teams to maintain.</p>
                </div>
              </div>
              <div style="display:flex;gap:1rem;align-items:flex-start;">
                <div style="width:36px;height:36px;background:rgba(196,168,130,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                  <i class="fas fa-users" style="color:var(--accent);font-size:0.85rem;"></i>
                </div>
                <div>
                  <h4 style="font-size:0.95rem;margin-bottom:0.2rem;">User-Centered Design</h4>
                  <p style="font-size:0.85rem;color:var(--text-muted);">Every feature I build starts with asking how it serves the person who will use it.</p>
                </div>
              </div>
              <div style="display:flex;gap:1rem;align-items:flex-start;">
                <div style="width:36px;height:36px;background:rgba(196,168,130,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                  <i class="fas fa-sync" style="color:var(--accent);font-size:0.85rem;"></i>
                </div>
                <div>
                  <h4 style="font-size:0.95rem;margin-bottom:0.2rem;">Continuous Learning</h4>
                  <p style="font-size:0.85rem;color:var(--text-muted);">The web evolves fast — I stay current through courses, projects, and community engagement.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="about-section reveal">
            <h3>Certificates & Credentials</h3>
            <div class="divider" style="margin:0 0 1.2rem;"></div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(240px, 1fr));gap:1rem;margin-top:1.5rem;">
              @foreach($certificates as $cert)
              <div class="card" style="padding:1.2rem;display:flex;gap:1rem;align-items:center;">
                <div style="width:40px;height:40px;background:rgba(196,168,130,0.1);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                  <i class="{{ $cert->icon }}" style="color:var(--accent);font-size:1.1rem;"></i>
                </div>
                <div>
                  <h4 style="font-size:0.9rem;margin-bottom:0.1rem;">{{ $cert->title }}</h4>
                  <p style="font-size:0.75rem;color:var(--text-muted);">{{ $cert->issuer }} · {{ $cert->year }}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <div style="display:flex;gap:1rem;flex-wrap:wrap;margin-top:1rem;" class="reveal">
            <a href="{{ route('contact') }}" class="btn btn-primary">Get In Touch <i class="fas fa-arrow-right"></i></a>
            <a href="{{ route('projects') }}" class="btn btn-outline">See My Work</a>
          </div>
        </main>
      </div>
    </div>
  </section>
@endsection
