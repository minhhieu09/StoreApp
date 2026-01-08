@extends('layouts.main')
@push('title')
    <title>Product</title>
@endpush
@section('content')
    <div class="container-product">
        <!-- Features Section -->
        <div class="features">
            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Giao hàng tự động</h3>
                    <p>Kích hoạt tài khoản ngay lập tức</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Cập nhật mới nhất</h3>
                    <p>Tài khoản mới, chính chủ</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Bảo hành Full Time</h3>
                    <p>Tài khoản được bảo hành trong suốt thời gian sử dụng</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="feature-content">
                    <h3>Hỗ trợ 24/7</h3>
                    <p>Hỗ trợ nhanh, các vấn đề về tài khoản</p>
                </div>
            </div>
        </div>


        <!-- Google Accounts Section -->
        <div class="section">
            <div class="section-header">
                <h2>Tài khoản Google</h2>
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7"/>
                </svg>
            </div>

            <div class="slider-wrapper">
                <button class="nav-button prev" id="prevBtn">
                    <svg viewBox="0 0 24 24">
                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                    </svg>
                </button>

                <div class="slider-container">
                    <div class="products-grid" id="productsSlider">
                        @foreach($products as $item)
                            <div class="product-card">
                                <div class="product-image product-2">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="badge">SẢN PHẨM</div>
                                    <h3>{{$item->name}}</h3>
                                    <div class="product-price">{{$item->price}}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <button class="nav-button next" id="nextBtn">
                    <svg viewBox="0 0 24 24">
                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        const productsSlider = document.getElementById('productsSlider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let currentPosition = 0;
        const cardWidth = productsSlider.children[0].offsetWidth;
        const gap = 16;
        const slideAmount = cardWidth + gap;

        function updateButtons() {
            const maxScroll = productsSlider.scrollWidth - productsSlider.parentElement.offsetWidth;
            prevBtn.disabled = currentPosition === 0;
            nextBtn.disabled = Math.abs(currentPosition) >= maxScroll - 10;
        }

        function slideNext() {
            const maxScroll = productsSlider.scrollWidth - productsSlider.parentElement.offsetWidth;
            if (Math.abs(currentPosition) < maxScroll) {
                currentPosition -= slideAmount * 3;
                if (Math.abs(currentPosition) > maxScroll) {
                    currentPosition = -maxScroll;
                }
                productsSlider.style.transform = `translateX(${currentPosition}px)`;
                updateButtons();
            }
        }

        function slidePrev() {
            if (currentPosition < 0) {
                currentPosition += slideAmount * 3;
                if (currentPosition > 0) {
                    currentPosition = 0;
                }
                productsSlider.style.transform = `translateX(${currentPosition}px)`;
                updateButtons();
            }
        }

        nextBtn.addEventListener('click', slideNext);
        prevBtn.addEventListener('click', slidePrev);

        // Product card click handlers
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('click', function(e) {
                console.log('Card clicked:', this.querySelector('h3').textContent);
                // Add your navigation logic here
            });
        });

        updateButtons();

        window.addEventListener('resize', () => {
            currentPosition = 0;
            productsSlider.style.transform = 'translateX(0)';
            updateButtons();
        });
    </script>
@endsection
