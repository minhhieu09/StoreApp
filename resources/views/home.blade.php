@extends('layouts.main')
@push('title')
    <title>Home Page</title>
@endpush
@section('content')
    <main>
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
                            <path
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
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
                            <path
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
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
                            <path
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3>Hỗ trợ 24/7</h3>
                        <p>Hỗ trợ nhanh, các vấn đề về tài khoản</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="products-section">
            <h2 class="section-title">Sản Phẩm Bán Chạy</h2>

            <div class="products-grid-item">
                @foreach($bestSellerProducts as $item)
                    <div class="product-card-home">
                        <div class="product-image product-2">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $item->name }}</div>
                            <div class="product-price">{{ $item->price }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- CTA Banner -->
        <section class="cta-banner">
            <h2>Bắt đầu dự án với 4S Design</h2>
            <p>Liên hệ với 4S Design để được tư vấn trực tiếp</p>
            <a href="#contact" class="cta-button">LIÊN HỆ</a>
        </section>

        <!-- Products Section 2 -->
        <section class="products-section">
            <h2 class="section-title">Sản Phẩm Mới Nhất</h2>

            <div class="products-grid-item">
                @foreach($newestProducts as $item)
                    <div class="product-card-home">
                        <div class="product-image">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $item->name }}</div>
                            <div class="product-price">{{ $item->price }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection



