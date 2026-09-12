<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="menu_category_id" class="form-select" required>
        <option value="">Select a category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected(old('menu_category_id', $menuItem->menu_category_id ?? null) == $category->id)>
            {{ $category->name }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $menuItem->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $menuItem->description ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Price ($)</label>
        <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ old('price', $menuItem->price ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        <div class="form-text">JPG, PNG, or WEBP. Max 2MB.</div>

        @if (!empty($menuItem) && $menuItem->image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $menuItem->image) }}" alt="{{ $menuItem->name }}" style="width:80px;height:80px;object-fit:cover;border-radius:8px;">
            <div class="form-text">Current photo — uploading a new one will replace it.</div>
        </div>
        @endif
    </div>
</div>

<div class="form-check form-switch mb-2">
    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" @checked(old('is_featured', $menuItem->is_featured ?? false))>
    <label class="form-check-label" for="is_featured">Featured on homepage</label>
</div>
<div class="form-check form-switch mb-4">
    <input class="form-check-input" type="checkbox" name="is_available" value="1" id="is_available" @checked(old('is_available', $menuItem->is_available ?? true))>
    <label class="form-check-label" for="is_available">Available on menu</label>
</div>

<button type="submit" class="btn" style="background:#6f4e37;color:#fff;">Save Menu Item</button>
<a href="{{ route('admin.menu.index') }}" class="btn btn-outline-secondary">Cancel</a>