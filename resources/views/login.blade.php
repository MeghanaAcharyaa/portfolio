@extends('layouts.app')

@section('title', 'Login — Meghana Acharya')

@section('styles')
<style>
  .navbar, .footer { display: none; }
  body { background: var(--warm-white); }
</style>
@endsection

@section('content')
  <div class="login-page">
    <!-- Decorative blobs -->
    <div style="position:absolute;top:-10%;left:-10%;width:500px;height:500px;background:radial-gradient(circle,rgba(196,168,130,0.12) 0%,transparent 70%);pointer-events:none;"></div>
    <div style="position:absolute;bottom:-10%;right:-10%;width:400px;height:400px;background:radial-gradient(circle,rgba(155,107,75,0.1) 0%,transparent 70%);pointer-events:none;"></div>

    <div class="login-card">
      <div class="login-header">
        <div class="login-logo">M<span>.</span>Acharya</div>
        <p>Sign in to access your dashboard</p>
      </div>

      <!-- Social Login (UI only) -->
      <div style="display:flex;gap:0.8rem;margin-bottom:1.5rem;">
        <button class="btn btn-outline" style="flex:1;justify-content:center;"
          onclick="showToast('Google login (UI only)'); return false;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
          </svg>
          Google
        </button>
        <button class="btn btn-outline" style="flex:1;justify-content:center;"
          onclick="showToast('GitHub login (UI only)'); return false;">
          <i class="fab fa-github"></i> GitHub
        </button>
      </div>

      <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem;">
        <div style="flex:1;height:1px;background:var(--sand);"></div>
        <span style="font-size:0.75rem;color:var(--text-light);letter-spacing:0.08em;">OR</span>
        <div style="flex:1;height:1px;background:var(--sand);"></div>
      </div>

      <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email Address</label>
          <div style="position:relative;">
            <i class="fas fa-envelope" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:0.85rem;"></i>
            <input type="email" name="email" id="email" placeholder="admin@meghana.dev" required
              style="padding-left:2.8rem;"/>
          </div>
        </div>
        <div class="form-group">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem;">
            <label for="password" style="margin-bottom:0;">Password</label>
            <a href="#" style="font-size:0.78rem;color:var(--accent);font-weight:500;"
               onclick="showToast('Password reset (UI only)'); return false;">
              Forgot password?
            </a>
          </div>
          <div style="position:relative;">
            <i class="fas fa-lock" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:0.85rem;"></i>
            <input type="password" name="password" id="password" placeholder="Enter your password" required
              style="padding-left:2.8rem;padding-right:3rem;"/>
            <button type="button" id="togglePass"
              style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:0.85rem;"
              onclick="
                const p = document.getElementById('password');
                const icon = this.querySelector('i');
                if(p.type==='password'){p.type='text';icon.className='fas fa-eye-slash';}
                else{p.type='password';icon.className='fas fa-eye';}
              ">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>

        <div style="display:flex;align-items:center;gap:0.6rem;margin-bottom:1.8rem;">
          <input type="checkbox" name="remember" id="remember" style="width:16px;height:16px;accent-color:var(--accent);cursor:pointer;"/>
          <label for="remember" style="font-size:0.85rem;color:var(--text-muted);cursor:pointer;margin:0;">
            Keep me signed in
          </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:0.85rem;">
          <i class="fas fa-sign-in-alt"></i> Sign In
        </button>
      </form>

      <div class="login-footer">
        <p>Don't have an account? <a href="#" onclick="showToast('Registration (UI only)'); return false;">Request Access</a></p>
        <p style="margin-top:0.5rem;">
          <a href="{{ route('home') }}" style="color:var(--text-muted);font-size:0.78rem;">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
          </a>
        </p>
      </div>
    </div>
  </div>
@endsection
