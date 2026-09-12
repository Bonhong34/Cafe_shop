@extends('admin.layout')

@section('title', 'Reservations')

@section('content')
<div class="card stat-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                    <th>Notes</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $r)
                <tr>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->phone }}{{ $r->email ? ' / '.$r->email : '' }}</td>
                    <td>{{ \Illuminate\Support\Carbon::parse($r->reservation_date)->format('M j, Y') }}</td>
                    <td>{{ \Illuminate\Support\Carbon::parse($r->reservation_time)->format('g:i A') }}</td>
                    <td>{{ $r->guests }}</td>
                    <td class="text-muted small">{{ \Illuminate\Support\Str::limit($r->notes, 40) }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.reservations.destroy', $r) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this reservation?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">No reservations yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $reservations->links() }}</div>
@endsection