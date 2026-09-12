@extends('admin.layout')

@section('title', 'Menu Items')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.menu.create') }}" class="btn btn-cafe" style="background:#6f4e37;color:#fff;">
        <i class="bi bi-plus-lg"></i> Add Menu Item
    </a>
</div>

<div class="card stat-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Available</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? '—' }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{!! $item->is_featured ? '<span class="badge bg-warning text-dark">Yes</span>' : '<span class="text-muted">No</span>' !!}</td>
                    <td>{!! $item->is_available ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.menu.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">No menu items yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection