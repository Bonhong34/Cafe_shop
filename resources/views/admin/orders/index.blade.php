@extends('admin.layout')

@section('title', 'Orders')

@section('content')
<div class="card stat-card">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Placed</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>
                        {{ $order->customer_name }}<br>
                        <span class="text-muted small">{{ $order->customer_phone }}</span>
                    </td>
                    <td class="small">
                        @foreach ($order->items as $item)
                        {{ $item->quantity }}× {{ $item->item_name }}<br>
                        @endforeach
                    </td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>
                        <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="d-flex align-items-center gap-1">
                            @csrf @method('PATCH')
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width:auto;">
                                <option value="pending" @selected($order->status === 'pending')>Pending</option>
                                <option value="completed" @selected($order->status === 'completed')>Completed</option>
                                <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td class="text-muted small">{{ $order->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this order?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">No orders yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $orders->links() }}</div>
@endsection