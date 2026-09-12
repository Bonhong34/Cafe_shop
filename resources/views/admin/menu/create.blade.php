@extends('admin.layout')

@section('title', 'Add Menu Item')

@section('content')
<div class="card stat-card p-4" style="max-width: 640px;">
    <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.menu._form')
    </form>
</div>
@endsection