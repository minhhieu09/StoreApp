@extends('layouts.main')
@push('title')
    <title>Category</title>
@endpush
@section('content')
    <div class="container-detail">
        <div class="product-images">
            <div class="main-image">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="600" height="800">
                <div class="image-actions">
                    <button class="action-btn">↗</button>
                    <button class="action-btn">♡</button>
                </div>
            </div>
            <hr>
            <div>
                <h5>Điểm nổi bật</h5>
                <div class="highlights">
                    <div class="item">
                        <div class="icon"></div>
                        <div class="text">Hoàn toàn ổn định, không lỗi</div>
                    </div>

                    <div class="item">
                        <div class="icon"></div>
                        <div class="text">Hỗ trợ 24/7 qua Fanpage</div>
                    </div>

                    <div class="item">
                        <div class="icon"></div>
                        <div class="text">Bảo hành 1-1</div>
                    </div>

                    <div class="item">
                        <div class="icon"></div>
                        <div class="text">KHÔNG CRACK, KHÔNG SHARE</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-info">
            <div class="brand">
                <a href="{{route('product')}}" style="text-decoration: none ; color: #666666" >Trang chủ / </a>{{$item->category_relation->name ?? ""}}</div>
            <h1>{{$item->name}}</h1>

            <div class="price-section">
                <span class="old-price">
                    @if($item->product_variant_min_price == $item->product_variant_max_price)
                        {{ number_format($item->product_variant_min_price) }} đ
                    @else
                        {{ number_format($item->product_variant_min_price) }} -
                        {{ number_format($item->product_variant_max_price) }} đ
                    @endif
                </span>
                <span class="current-price">
                    @if($item->product_variant_min_sale_price == $item->product_variant_max_sale_price)
                        {{ number_format($item->product_variant_min_sale_price) }} đ
                    @else
                        {{ number_format($item->product_variant_min_sale_price) }} -
                        {{ number_format($item->product_variant_max_sale_price) }} đ
                    @endif
                </span>
            </div>

            <div class="rating">
                <span class="stars">⭐ 4.5</span>
                <span>1238 Sold</span>
            </div>

            <div class="description">
                <h3>Mô tả:</h3>
                <p>{{$item->description}} <span class="see-more">See More...</span></p>
            </div>

            <div class="size-section">
                <div class="section-label">
                    <span class="view-chart">Loại</span>
                </div>
                <div class="duration-options">
{{--                    @dd($item->product_variant->groupBy('type'))--}}
                    @foreach($item->product_variant->groupBy('type') as $key => $type)
                        <button class="duration-option" data-parent-type="{{$key}}">{{$key}}</button>
                    @endforeach
                </div>
            </div>

            <div class="size-section">
                <div class="section-label">
                    <span class="view-chart">Tháng</span>
                </div>
                <div class="duration-options">
                    @foreach($item->product_variant->groupBy('type') as $key => $type)
                        @foreach($type as $index => $itemType)
                            <button class="duration-option {{$key == $item->product_variant->groupBy('type')->keys()->first() ? "" : "d-none"}}" data-price="{{$itemType->price}}" data-sale-price="{{$itemType->sale_price}}" data-duration="{{$itemType->duration}}" data-type="{{$key}}">{{$itemType->duration}} Tháng</button>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div class="actions">
                <button class="btn btn-primary">Thêm vào giỏ hàng</button>
                <button class="btn btn-secondary">Mua ngay</button>
            </div>

            <div class="delivery-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check mr-2 size-6 shrink-0 text-gray-400 group-hover:text-gray-500" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path><path d="m9 12 2 2 4-4"></path></svg>
                Bảo hành tài khoản Full Time
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

        // dataset price
        document.querySelectorAll('.duration-option').forEach(btn => {
            btn.addEventListener('click', function() {
                const price = this.dataset.price;
                const salePrice = this.dataset.salePrice;
                const duration = this.dataset.duration;
                const type = this.dataset.type;
                const priceBox = document.getElementById('price');

            })
        })

        const typeButtons = document.querySelectorAll('[data-parent-type]');
        const durationButtons = document.querySelectorAll('[data-type]');

        typeButtons.forEach(btn => {
            btn.addEventListener('click', function () {

                const selectedType = this.dataset.parentType;

                // Active button type
                typeButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Show / hide duration buttons
                durationButtons.forEach(dBtn => {
                    if (dBtn.dataset.type === selectedType) {
                        dBtn.classList.remove('d-none');
                    } else {
                        dBtn.classList.add('d-none');
                    }
                });
            });
        });
        //set-data-price
        const oldPriceEl = document.querySelector('.old-price');
        const currentPriceEl = document.querySelector('.current-price');

        durationButtons.forEach(btn => {
            btn.addEventListener('click', function () {

                const price = this.dataset.price;
                const salePrice = this.dataset.salePrice;

                // Format tiền VND
                const formatVND = (value) =>
                    new Intl.NumberFormat('vi-VN').format(value) + ' đ';

                // Giá gốc
                if (price) {
                    oldPriceEl.textContent = formatVND(price);
                    oldPriceEl.style.display = 'inline';
                }

                // Giá sale
                if (salePrice && salePrice > 0) {
                    currentPriceEl.textContent = formatVND(salePrice);
                } else {
                    currentPriceEl.textContent = '';
                }

                // Active state
                durationButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

            });
        });
    </script>
@endsection
