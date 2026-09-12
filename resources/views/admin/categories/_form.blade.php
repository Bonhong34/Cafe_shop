<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="mb-4">
    <label class="form-label">Sort Order</label>
    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0">
    <div class="form-text">Lower numbers appear first on the menu page.</div>
</div>

<button type="submit" class="btn" style="background:#6f4e37;color:#fff;">Save Category</button>
<a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>