@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
<div class="card stat-card p-4" style="max-width: 560px;">
    <form method="POST" action="{{ route('admin.categories.update', $category) }}">
        @csrf
        @method('PUT')
        @include('admin.categories._form')
    </form>
</div>
@endsection