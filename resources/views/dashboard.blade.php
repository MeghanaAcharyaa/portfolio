@extends('layouts.admin')

@section('title', 'Dashboard — Meghana Acharya')

@section('content')
  <!-- TOP BAR -->
  <div class="dash-topbar">
    <div style="display:flex;align-items:center;gap:1rem;">
      <button id="sidebarToggle"
        style="display:none;background:none;border:none;cursor:pointer;color:var(--espresso);font-size:1.1rem;padding:4px;"
        class="mobile-only">
        <i class="fas fa-bars"></i>
      </button>
      <h2>Dashboard</h2>
      <span style="font-size:0.75rem;color:var(--text-muted);">
        Welcome back, Meghana 👋
      </span>
    </div>
    <div class="topbar-actions">
      <div style="font-size:0.78rem;color:var(--text-muted);">
        <i class="fas fa-calendar" style="margin-right:4px;color:var(--accent);"></i>
        April 2024
      </div>
      <div class="topbar-badge">
        <i class="fas fa-bell" style="font-size:0.85rem;"></i>
        <div class="badge-dot"></div>
      </div>
      <div class="user-avatar">M</div>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="dash-content">

    <!-- SUMMARY CARDS -->
    <div class="summary-cards">
      <div class="summary-card">
        <div class="summary-card-top">
          <div class="summary-icon orange"><i class="fas fa-eye"></i></div>
          <span class="summary-change up"><i class="fas fa-arrow-up"></i> 12%</span>
        </div>
        <div class="summary-num" data-count="{{ $profile->views ?? 0 }}">{{ $profile->views ?? 0 }}</div>
        <div class="summary-label">Total Visitors</div>
      </div>
      <div class="summary-card">
        <div class="summary-card-top">
          <div class="summary-icon blue"><i class="fas fa-envelope"></i></div>
          <span class="summary-change {{ $messages->where('is_read', false)->count() > 0 ? 'up' : '' }}">
            <i class="fas fa-arrow-up"></i> {{ $messages->where('is_read', false)->count() }}
          </span>
        </div>
        <div class="summary-num" data-count="{{ $messages->count() }}">{{ $messages->count() }}</div>
        <div class="summary-label">Messages Received</div>
      </div>
      <div class="summary-card">
        <div class="summary-card-top">
          <div class="summary-icon green"><i class="fas fa-folder-open"></i></div>
          <span class="summary-change up"><i class="fas fa-arrow-up"></i> 1</span>
        </div>
        <div class="summary-num" data-count="{{ $projects_count }}">{{ $projects_count }}</div>
        <div class="summary-label">Projects Count</div>
      </div>
      <div class="summary-card">
        <div class="summary-card-top">
          <div class="summary-icon purple"><i class="fas fa-certificate"></i></div>
          <span class="summary-change up"><i class="fas fa-arrow-up"></i> 2</span>
        </div>
        <div class="summary-num" data-count="{{ $certificates_count }}">{{ $certificates_count }}</div>
        <div class="summary-label">Certificates</div>
      </div>
    </div>

    <!-- MESSAGES TABLE -->
    <div class="dash-section" id="messages">
      <div class="dash-section-head">
        <h3><i class="fas fa-envelope" style="color:var(--accent);margin-right:0.5rem;"></i> Recent Messages</h3>
        <span style="font-size:0.78rem;color:var(--text-muted);">{{ $messages->where('is_read', false)->count() }} unread</span>
      </div>
      <div class="messages-table">
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message Preview</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($messages as $index => $message)
              <tr>
                <td style="color:var(--text-muted);font-size:0.78rem;">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                <td style="font-weight:500;">{{ $message->name }}</td>
                <td style="color:var(--text-muted);">{{ $message->email }}</td>
                <td style="color:var(--text-muted);max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $message->message }}</td>
                <td><span class="status-badge {{ $message->is_read ? 'read' : 'new' }}">{{ $message->is_read ? 'Read' : 'New' }}</span></td>
                <td style="color:var(--text-muted);font-size:0.8rem;">{{ $message->created_at->format('M d, Y') }}</td>
                <td>
                  <button class="btn btn-sm btn-accent"
                    onclick="openModal({{ $message->id }}, '{{ $message->name }}','{{ $message->email }}','{{ addslashes($message->message) }}')">
                    <i class="fas fa-reply"></i> Reply
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" style="text-align:center;padding:2rem;color:var(--text-muted);">No messages yet.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>



  </div>

  <!-- REPLY MODAL -->
  <div class="modal-overlay" id="replyModal">
    <div class="modal">
      <div class="modal-header">
        <h3>Reply to Message</h3>
        <button class="modal-close" onclick="closeModal()">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-msg-detail">
        <div class="msg-from">
          From: <strong id="modal-from-name">—</strong>
          &nbsp;·&nbsp;
          <span id="modal-from-email" style="color:var(--text-muted);font-size:0.82rem;">—</span>
        </div>
        <p id="modal-message" style="margin-top:0.5rem;">—</p>
      </div>
      <form id="replyForm">
        @csrf
        <div class="form-group">
          <label for="reply-text">Your Reply</label>
          <textarea id="reply-text" placeholder="Write your reply here..." style="min-height:120px;" required></textarea>
        </div>
        <div style="display:flex;gap:0.8rem;justify-content:flex-end;">
          <button type="button" class="btn btn-outline" onclick="closeModal()">Cancel</button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Send Reply
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
<script>
  function scrollToSection(id) {
    const el = document.getElementById(id);
    if (el) {
      const top = el.getBoundingClientRect().top + window.scrollY - 90;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  }

  // Sidebar toggle
  const toggleBtn = document.getElementById('sidebarToggle');
  if (window.innerWidth <= 768 && toggleBtn) {
    toggleBtn.style.display = 'block';
  }
</script>
@endsection
