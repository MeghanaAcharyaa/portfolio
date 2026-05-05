@extends('layouts.admin')

@section('title', 'Messages — Admin Panel')

@section('content')
  <div class="dash-topbar">
    <div style="display:flex;align-items:center;gap:1rem;">
      <h2>Messages</h2>
    </div>
  </div>

  <div class="dash-content">
    <div class="dash-section">
      <div class="dash-section-head">
        <h3><i class="fas fa-envelope" style="color:var(--accent);margin-right:0.5rem;"></i> All Messages</h3>
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
                <th>Message</th>
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
                <td style="color:var(--text-muted);max-width:300px;">{{ $message->message }}</td>
                <td><span class="status-badge {{ $message->is_read ? 'read' : 'new' }}">{{ $message->is_read ? 'Read' : 'New' }}</span></td>
                <td style="color:var(--text-muted);font-size:0.8rem;">{{ $message->created_at->format('M d, Y') }}</td>
                <td style="display:flex;gap:0.5rem;">
                  <button class="btn btn-sm btn-accent"
                    onclick="openModal({{ $message->id }}, '{{ $message->name }}','{{ $message->email }}','{{ addslashes($message->message) }}')">
                    <i class="fas fa-reply"></i> Reply
                  </button>
                  <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline" style="color:var(--clay);border-color:var(--clay);">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" style="text-align:center;padding:2rem;color:var(--text-muted);">No messages found.</td>
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
