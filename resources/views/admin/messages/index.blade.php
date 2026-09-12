@extends('admin.layout')

@section('title', 'Contact Messages')

@section('content')
<div class="card stat-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Received</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $m)
                <tr>
                    <td>{{ $m->name }}<br><span class="text-muted small">{{ $m->email }}</span></td>
                    <td>{{ $m->subject ?: '—' }}</td>
                    <td class="text-muted small">{{ \Illuminate\Support\Str::limit($m->message, 60) }}</td>
                    <td class="text-muted small">{{ $m->created_at->format('M j, Y g:i A') }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No messages yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $messages->links() }}</div>
@endsection