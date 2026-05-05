@extends('layouts.app')

@section('title', 'Projects — Meghana Acharya')

@section('content')
  <div class="page-hero">
    <div class="container">
      <span class="section-label">My Work</span>
      <h1 style="font-size:clamp(2.2rem,5vw,3.8rem);margin-top:0.5rem;">Featured <em>Projects</em></h1>
      <p style="color:var(--text-muted);max-width:520px;margin:1rem auto 0;">
        A collection of projects I've built — from e-commerce platforms to productivity tools, each reflecting my passion for clean, functional web development.
      </p>
    </div>
  </div>

  <section class="projects-full">
    <div class="container">

      <!-- FILTER -->
      <div class="projects-filter reveal">
        <button class="filter-btn active">All</button>
        <button class="filter-btn">Frontend</button>
        <button class="filter-btn">Full Stack</button>
        <button class="filter-btn">React</button>
        <button class="filter-btn">Laravel</button>
      </div>

      <div class="projects-full-grid">
        @forelse($projects as $index => $project)
        <div class="project-full-card card reveal" style="transition-delay: {{ $index * 0.1 }}s;">
          <div class="project-full-img" style="{{ $project->image_path ? 'background:url('.asset('storage/'.$project->image_path).');background-size:cover;background-position:center;' : 'background:linear-gradient(135deg,#E8E0D5 0%,#C4A882 100%);' }}">
            @if(!$project->image_path)
            <i class="fas fa-laptop-code" style="font-size:3.5rem;color:rgba(255,255,255,0.4);"></i>
            @endif
            <div class="overlay">
              <a href="{{ $project->link ?? '#' }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Demo</a>
            </div>
          </div>
          <div class="project-full-body">
            <h3>{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
            <div class="project-tags">
              @foreach(explode(',', $project->tags) as $tag)
              <span class="tag">{{ trim($tag) }}</span>
              @endforeach
            </div>
            <div class="project-links">
              <a href="{{ $project->link ?? '#' }}" class="btn btn-sm btn-primary">
                <i class="fas fa-external-link-alt"></i> Live Demo
              </a>
              <a href="#" class="btn btn-sm btn-outline" onclick="showToast('Source code on GitHub (UI only)'); return false;">
                <i class="fab fa-github"></i> Source Code
              </a>
            </div>
          </div>
        </div>
        @empty
        <p style="grid-column: 1/-1; text-align: center; color: var(--text-muted);">No projects found.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section style="background:var(--warm-white);padding:4rem 0;text-align:center;">
    <div class="container reveal">
      <h2 style="font-size:2rem;margin-bottom:1rem;">Have a project in mind?</h2>
      <p style="color:var(--text-muted);max-width:440px;margin:0 auto 2rem;">
        I'm always open to discussing new ideas, collaborations, or freelance opportunities.
      </p>
      <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Start a Conversation <i class="fas fa-arrow-right"></i></a>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    // Filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
@endsection
