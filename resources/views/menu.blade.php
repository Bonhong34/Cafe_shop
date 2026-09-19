@extends('layouts.app')

@section('title', 'Menu')

@push('styles')
<style>
    .menu-with-cart {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 30px;
        align-items: start;
    }

    @media (max-width: 991px) {
        .menu-with-cart {
            grid-template-columns: 1fr;
        }
    }

    .shop-cart {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, .06);
        position: sticky;
        top: 90px;
    }

    .cart-heading {
        font-weight: 700;
        color: #3a2e26;
        margin-bottom: 16px;
    }

    .cart-items {
        min-height: 80px;
        margin-bottom: 16px;
        max-height: 320px;
        overflow-y: auto;
    }

    .cart-item-row {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid #f5f0ec;
    }

    .cart-item-info {
        flex-grow: 1;
    }

    .cart-item-name {
        font-size: .85rem;
        font-weight: 500;
        color: #3a2e26;
    }

    .cart-item-price {
        font-size: .78rem;
        color: #999;
    }

    .cart-item-remove {
        border: none;
        background: none;
        color: #c0392b;
        font-size: .8rem;
    }

    .qty-stepper {
        display: flex;
        align-items: center;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }

    .qty-stepper button {
        border: none;
        background: #fdf1e6;
        width: 24px;
        height: 24px;
        font-size: .85rem;
        color: #6b6058;
    }

    .qty-stepper .qty-value {
        padding: 0 8px;
        font-size: .78rem;
        min-width: 16px;
        text-align: center;
    }

    .cart-totals {
        border-top: 1px dashed #eee;
        padding-top: 12px;
        margin-bottom: 16px;
    }

    .btn-place-order {
        width: 100%;
        background: #6f4e37;
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px;
        font-weight: 600;
    }

    .btn-place-order:hover {
        background: #4a3222;
        color: #fff;
    }

    .btn-add-cart {
        background: #6f4e37;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: .8rem;
    }

    .btn-add-cart:hover {
        background: #4a3222;
        color: #fff;
    }

    .cart-count-badge {
        background: #e8783c;
        color: #fff;
        font-size: .7rem;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-left: 4px;
    }

    .menu-item-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 14px 14px 0 0;
    }
</style>
@endpush

@section('content')

<section class="hero text-center" style="padding: 90px 0 60px;">
    <div class="container">
        <h1 style="font-size:2.4rem;">Our Menu</h1>
        <p class="lead">Freshly brewed coffee, teas, pastries, and light bites.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="menu-with-cart">

            {{-- MENU LIST --}}
            <div>
                @forelse ($categories as $category)
                <div class="mb-5">
                    <h3 class="category-heading">{{ $category->name }}</h3>
                    <div class="row g-4">
                        @forelse ($category->items as $item)
                        @php
                        $imageUrl = $item->image
                        ? asset('storage/' . $item->image)
                        : 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=400&q=80';
                        @endphp
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-menu-item">
                                <img src="{{ $imageUrl }}" alt="{{ $item->name }}" class="menu-item-img">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-1">{{ $item->name }}</h5>
                                        <span class="price-tag">${{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <p class="card-text text-muted small flex-grow-1">{{ $item->description }}</p>
                                    @if ($item->is_featured)
                                    <span class="badge bg-warning text-dark align-self-start mb-2">Popular</span>
                                    @endif
                                    <button type="button" class="btn-add-cart align-self-start"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-price="{{ $item->price }}"
                                        data-image="{{ $imageUrl }}">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted">No items in this category yet.</p>
                        @endforelse
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">
                    No menu items found. Run <code>php artisan db:seed</code> to load sample menu data.
                </p>
                @endforelse
            </div>

            {{-- CART SUMMARY --}}
            <aside class="shop-cart">
                <h5 class="cart-heading">Cart Summary <span class="cart-count-badge" id="cartCountBadge">0</span></h5>

                <div class="mb-2">
                    <input type="text" id="customerName" class="form-control form-control-sm mb-2" placeholder="Your name">
                    <input type="text" id="customerPhone" class="form-control form-control-sm" placeholder="Phone number">
                </div>

                <div id="cartItems" class="cart-items">
                    <p class="text-muted small text-center py-4" id="emptyCartMsg">Your cart is empty.</p>
                </div>

                <div class="cart-totals">
                    <div class="d-flex justify-content-between small mb-1">
                        <span>Subtotal</span><span id="cartSubtotal">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold pt-2 border-top">
                        <span>Total</span><span id="cartGrandTotal">$0.00</span>
                    </div>
                </div>

                <button class="btn-place-order" id="placeOrderBtn">Place an Order</button>
                <button class="btn btn-outline-secondary w-100 mt-2" id="cancelOrderBtn">Cancel</button>
            </aside>

        </div>
    </div>
</section>

<script>
    (function() {
        let cart = [];

        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-add-cart')) {
                const btn = e.target.closest('.btn-add-cart');
                addToCart({
                    id: btn.dataset.id,
                    name: btn.dataset.name,
                    price: parseFloat(btn.dataset.price),
                    image: btn.dataset.image,
                });
            }

            if (e.target.classList.contains('qty-plus') || e.target.classList.contains('qty-minus')) {
                const id = e.target.dataset.id;
                const item = cart.find(i => i.id === id);
                if (!item) return;
                if (e.target.classList.contains('qty-plus')) {
                    item.qty += 1;
                } else {
                    item.qty -= 1;
                    if (item.qty <= 0) {
                        cart = cart.filter(i => i.id !== id);
                    }
                }
                renderCart();
            }

            if (e.target.closest('.cart-item-remove')) {
                const id = e.target.closest('.cart-item-remove').dataset.id;
                cart = cart.filter(i => i.id !== id);
                renderCart();
            }
        });

        function addToCart(newItem) {
            const existing = cart.find(i => i.id === newItem.id);
            if (existing) {
                existing.qty += 1;
            } else {
                cart.push({
                    ...newItem,
                    qty: 1
                });
            }
            renderCart();
        }

        function renderCart() {
            const cartItems = document.getElementById('cartItems');
            const countBadge = document.getElementById('cartCountBadge');

            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-muted small text-center py-4" id="emptyCartMsg">Your cart is empty.</p>';
            } else {
                cartItems.innerHTML = '';
                cart.forEach(item => {
                    const row = document.createElement('div');
                    row.className = 'cart-item-row';
                    row.innerHTML = `
                    <img src="${item.image}" alt="${item.name}" style="width:42px;height:42px;object-fit:cover;border-radius:10px;">
                    <div class="cart-item-info">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                    </div>
                    <div class="qty-stepper">
                        <button type="button" class="qty-minus" data-id="${item.id}">−</button>
                        <span class="qty-value">${item.qty}</span>
                        <button type="button" class="qty-plus" data-id="${item.id}">+</button>
                    </div>
                    <button type="button" class="cart-item-remove" data-id="${item.id}"><i class="bi bi-x-lg"></i></button>
                `;
                    cartItems.appendChild(row);
                });
            }

            const subtotal = cart.reduce((sum, i) => sum + (i.price * i.qty), 0);
            document.getElementById('cartSubtotal').textContent = '$' + subtotal.toFixed(2);
            document.getElementById('cartGrandTotal').textContent = '$' + subtotal.toFixed(2);
            countBadge.textContent = cart.reduce((sum, i) => sum + i.qty, 0);
        }

        document.getElementById('placeOrderBtn').addEventListener('click', function() {
            if (cart.length === 0) {
                alert('Your cart is empty.');
                return;
            }

            const name = document.getElementById('customerName').value.trim();
            const phone = document.getElementById('customerPhone').value.trim();

            if (!name || !phone) {
                alert('Please enter your name and phone number.');
                return;
            }

            const payload = {
                customer_name: name,
                customer_phone: phone,
                items: cart.map(i => ({
                    name: i.name,
                    price: i.price,
                    qty: i.qty
                })),
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route("orders.store") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(payload),
                    })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Order #' + data.order_id + ' placed! We\'ll have it ready soon.');
                        cart = [];
                        document.getElementById('customerName').value = '';
                        document.getElementById('customerPhone').value = '';
                        renderCart();
                    } else {
                        alert('Something went wrong placing your order.');
                    }
                })
                .catch(() => alert('Something went wrong placing your order.'));
        });

        document.getElementById('cancelOrderBtn').addEventListener('click', function() {
            cart = [];
            renderCart();
        });
    })();
</script>

@endsection