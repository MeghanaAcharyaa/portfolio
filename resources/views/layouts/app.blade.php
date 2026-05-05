<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Meghana Acharya — Web Developer')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  @yield('styles')
</head>
<body>

  <!-- ═══════════════════════════════════════ NAVBAR -->
  <nav class="navbar">
    <div class="nav-inner">
      <a href="{{ route('home') }}" class="nav-logo">Meghana<span> </span>Acharya</a>
      <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Me</a></li>
        <li><a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'active' : '' }}">Skills</a></li>
        <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Me</a></li>
      </ul>
      <button class="nav-toggle" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  @if(session('success'))
    <div style="position:fixed;top:20px;right:20px;background:var(--accent);color:white;padding:1rem 2rem;border-radius:var(--radius-md);box-shadow:var(--shadow-lg);z-index:9999;animation:slideIn 0.5s ease-out;" id="success-alert">
      {{ session('success') }}
      <button onclick="this.parentElement.remove()" style="background:none;border:none;color:white;margin-left:1rem;cursor:pointer;"><i class="fas fa-times"></i></button>
    </div>
    <script>
      setTimeout(() => {
        const alert = document.getElementById('success-alert');
        if(alert) alert.style.opacity = '0';
        setTimeout(() => alert && alert.remove(), 500);
      }, 5000);
    </script>
    <style>
      @keyframes slideIn { from { transform: translateX(100%); } to { transform: translateX(0); } }
    </style>
  @endif

  @yield('content')

  <!-- ═══════════════════════════════════════ FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-logo">Meghana<span> </span>Acharya</div>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('skills') }}">Skills</a></li>
          <li><a href="{{ route('projects') }}">Projects</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <div class="social-icons">
          <a href="https://github.com/MeghanaAcharyaa" target="_blank" class="social-icon"><i class="fab fa-github"></i></a>
          <a href="https://www.linkedin.com/in/meghana-acharya-a09548289" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          <a href="mailto:meghanaashok.cse@gmail.com" class="social-icon"><i class="fas fa-envelope"></i></a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Meghana Acharya. d/o Ashok Acharya. Designed &amp; built with <i class="fas fa-heart" style="color:var(--clay);"></i></p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/script.js') }}"></script>
  @yield('scripts')
</body>
</html>
