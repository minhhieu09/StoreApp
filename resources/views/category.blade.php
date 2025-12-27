@extends('layouts.main')
@push('title')
    <title>Category</title>
@endpush
@section('content')
    <div class="container-detail">
        <div class="product-images">
            <div class="main-image">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='800'%3E%3Crect width='600' height='800' fill='%23e8e8e8'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dominant-baseline='middle' font-family='Arial' font-size='24' fill='%23999'%3EProduct Image%3C/text%3E%3C/svg%3E" alt="Long Sleeve Overshirt">
                <div class="image-actions">
                    <button class="action-btn">↗</button>
                    <button class="action-btn">♡</button>
                </div>
            </div>
            <div class="thumbnails">
                <div class="thumbnail active">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='100'%3E%3Crect width='80' height='100' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Thumbnail 1">
                </div>
                <div class="thumbnail">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='100'%3E%3Crect width='80' height='100' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Thumbnail 2">
                </div>
                <div class="thumbnail">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='100'%3E%3Crect width='80' height='100' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Thumbnail 3">
                </div>
                <div class="thumbnail">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='100'%3E%3Crect width='80' height='100' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Thumbnail 4">
                </div>
                <div class="thumbnail">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='100'%3E%3Crect width='80' height='100' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Thumbnail 5">
                </div>
            </div>
        </div>

        <div class="product-info">
            <div class="brand">Adobe Creative Cloud</div>
            <h1>Adobe Creative Cloud</h1>

            <div class="price-section">
                <span class="old-price">1.990.000đ VNĐ</span>
                <span class="current-price">540.000đ VNĐ</span>
            </div>

            <div class="rating">
                <span class="stars">⭐ 4.5</span>
                <span>1238 Sold</span>
            </div>

            <div class="description">
                <h3>Mô tả:</h3>
                <p>Hàng trial fake Business cực uy tín <span class="see-more">See More...</span></p>
            </div>



            <div class="size-section">
                <div class="section-label">
                    <span class="view-chart">Tháng</span>
                </div>
                <div class="size-options">
                    <button class="size-option">1 tháng</button>
                    <button class="size-option active">1 năm</button>

                </div>
            </div>

            <div class="actions">
                <button class="btn btn-primary">Thêm vào giỏ hàng</button>
                <button class="btn btn-secondary">Mua ngay</button>
            </div>

            <div class="delivery-info">
                Zalo: 0332920296
            </div>
        </div>
    </div>

    <div class="related-products">
        <div class="related-header">
            <h2>Sản phẩm liên quan</h2>
            <a href="#" class="view-all">Xem Thêm</a>
        </div>
        <div class="product-grid">
            <div class="product-card">
                <div class="product-card-image">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='400'%3E%3Crect width='300' height='400' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Product">
                </div>
                <div class="product-card-info">
                    <h3>Capcut Pro</h3>
                    <div class="price">500.000đ</div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card-image">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='400'%3E%3Crect width='300' height='400' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Product">
                </div>
                <div class="product-card-info">
                    <h3>Capcut Pro</h3>
                    <div class="price">500.000đ</div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card-image">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='400'%3E%3Crect width='300' height='400' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Product">
                </div>
                <div class="product-card-info">
                    <h3>Capcut Pro</h3>
                    <div class="price">500.000đ</div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card-image">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='400'%3E%3Crect width='300' height='400' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Product">
                </div>
                <div class="product-card-info">
                    <h3>Capcut Pro</h3>
                    <div class="price">500.000đ</div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card-image">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='400'%3E%3Crect width='300' height='400' fill='%23e8e8e8'/%3E%3C/svg%3E" alt="Product">
                </div>
                <div class="product-card-info">
                    <h3>Capcut Pro</h3>
                    <div class="price">500.000đ</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Size selection
        document.querySelectorAll('.size-option').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.size-option').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Color selection
        document.querySelectorAll('.color-option').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.color-option').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Thumbnail selection
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.addEventListener('click', function() {
                document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
@endsection
