<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Dashboard — Meghana Acharya')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  @yield('styles')
</head>
<body>

  <div class="dashboard-layout">

    <!-- ══════════════════════════ SIDEBAR -->
    <aside class="sidebar" id="sidebar">
      <div class="sidebar-brand">
        <div class="logo">Meghana<span> </span>Acharya</div>
        <p>Portfolio Admin</p>
      </div>

      <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>
        <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <i class="fas fa-th-large"></i> Dashboard
        </a>
        <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
          <i class="fas fa-envelope"></i> Messages
          <span id="unread-badge" style="margin-left:auto;background:var(--accent);color:white;font-size:0.65rem;padding:0.15rem 0.5rem;border-radius:100px;{{ $unread_messages_count > 0 ? '' : 'display:none;' }}">{{ $unread_messages_count }}</span>
        </a>



        <div class="nav-section-label" style="margin-top:1rem;">Portfolio</div>
        <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
          <i class="fas fa-globe"></i> View Site
        </a>
        <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
          <i class="fas fa-folder-open"></i> Projects
        </a>
        <a href="{{ route('admin.certificates.index') }}" class="sidebar-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
          <i class="fas fa-certificate"></i> Certificates
        </a>
        <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
          <i class="fas fa-bolt"></i> Skills
        </a>
        <a href="{{ route('admin.profile.index') }}" class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
          <i class="fas fa-user-edit"></i> Profile / About
        </a>

        <div class="nav-section-label" style="margin-top:1rem;">Account</div>
        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">@csrf</form>
        <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </nav>

      <div class="sidebar-footer">
        <div class="sidebar-user">
          <div class="user-avatar">M</div>
          <div class="user-info">
            <div class="name">Meghana Acharya</div>
            <div class="role-text">Administrator</div>
          </div>
        </div>
      </div>
    </aside>

    <!-- ══════════════════════════ MAIN -->
    <main class="dashboard-main">
      @yield('content')
    </main>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
  @yield('scripts')
  <script>
    // Live update for unread messages badge
    function updateUnreadBadge() {
      fetch('{{ route('admin.messages.count') }}')
        .then(response => response.json())
        .then(data => {
          const badge = document.getElementById('unread-badge');
          if (badge) {
            badge.textContent = data.count;
            badge.style.display = data.count > 0 ? 'inline-block' : 'none';
          }
        });
    }
    // Poll every 30 seconds
    setInterval(updateUnreadBadge, 30000);
  </script>
</body>
</html>
