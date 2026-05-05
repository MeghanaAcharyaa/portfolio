@extends('layouts.app')

@section('title', 'Skills — Meghana Acharya')

@section('content')
  <div class="page-hero">
    <div class="container">
      <span class="section-label">What I Work With</span>
      <h1 style="font-size:clamp(2.2rem,5vw,3.8rem);margin-top:0.5rem;">My <em>Skills</em></h1>
      <p style="color:var(--text-muted);max-width:480px;margin:1rem auto 0;">
        A comprehensive overview of the technologies, frameworks, and tools I use to build modern web applications.
      </p>
    </div>
  </div>

  <section class="skills-full">
    <div class="container">

      @php
        $categories = [
          'Frontend' => ['icon' => 'fas fa-paint-brush', 'title' => 'Frontend Development'],
          'Backend' => ['icon' => 'fas fa-server', 'title' => 'Backend Development'],
          'Database' => ['icon' => 'fas fa-database', 'title' => 'Database'],
          'Tools' => ['icon' => 'fas fa-tools', 'title' => 'Tools & Workflow'],
        ];
      @endphp

      @foreach($categories as $catKey => $catData)
      @php $catSkills = $skills->where('category', $catKey); @endphp
      @if($catSkills->count() > 0)
      <div class="skills-category reveal">
        <h3><i class="{{ $catData['icon'] }}" style="color:var(--accent);"></i> {{ $catData['title'] }}</h3>
        <div class="skills-full-grid">
          @foreach($catSkills as $skill)
          <div class="skill-full-card card">
            <div class="skill-icon"><i class="{{ $skill->icon }}"></i></div>
            <h4>{{ $skill->name }}</h4>
            <p>{{ $skill->description }}</p>
            <div class="skill-level">
              @for($i = 1; $i <= 5; $i++)
                <div class="skill-dot {{ $i <= $skill->level ? 'filled' : '' }}"></div>
              @endfor
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
      @endforeach

    </div>
  </section>

  <!-- CTA -->
  <section style="background:var(--warm-white);padding:4rem 0;text-align:center;">
    <div class="container reveal">
      <h2 style="font-size:2rem;margin-bottom:1rem;">Ready to build something great?</h2>
      <p style="color:var(--text-muted);max-width:440px;margin:0 auto 2rem;">
        Let's combine these skills to create something exceptional together.
      </p>
      <div style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;">
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Get In Touch <i class="fas fa-arrow-right"></i></a>
        <a href="{{ route('projects') }}" class="btn btn-outline btn-lg">View Projects</a>
      </div>
    </div>
  </section>
@endsection
