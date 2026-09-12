@extends('admin.layout')

@section('title', 'Edit Menu Item')

@section('content')
<div class="card stat-card p-4" style="max-width: 640px;">
    <form method="POST" action="{{ route('admin.menu.update', $menuItem) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.menu._form')
    </form>
</div>
@endsection