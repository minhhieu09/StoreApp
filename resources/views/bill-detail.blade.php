@extends('layouts.main')
@push('title')
    <title>BillDetail</title>

@endpush
@section('content')

    <body>
    <div class="header">
        <h1>📸 Thư Viện Ảnh</h1>
        <p>Nhấn vào ảnh để xem chi tiết - Dùng nút hoặc phím mũi tên để cuộn</p>
    </div>

    @php
        $labels = [
            'today' => 'Hôm nay',
            'yesterday' => 'Hôm qua',
            'last_week' => 'Tuần trước',
            'older' => 'Cũ hơn'
        ];
    @endphp


    @foreach($groupedImages as $key => $images)
        <div class="timeline-section">
            <div class="timeline-header">
                <div class="timeline-date">{{ $labels[$key] }}</div>
                <div class="timeline-line"></div>
            </div>

            <div class="photo-carousel-wrapper">
                <button class="carousel-btn carousel-btn-prev"
                        onclick="scrollCarousel('carousel-{{ $key }}', -1)">‹</button>

                <div class="photo-carousel" id="carousel-{{ $key }}">
                    @foreach($images as $index => $image)
                        <div class="photo-item"
                             onclick="openLightbox({{ $loop->parent->index }} , {{ $index }})"
                             data-src="{{ asset('storage/' . $image->path) }}"
                             data-time="{{ $image->created_at->format('H:i') }}">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="">
                            <div class="photo-overlay">
                                <div class="photo-time">
                                    {{ $image->created_at->format('H:i') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-btn carousel-btn-next"
                        onclick="scrollCarousel('carousel-{{ $key }}', 1)">›</button>
            </div>
        </div>
    @endforeach
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">×</button>
            <img id="lightboxImage" class="lightbox-image" src="" alt="">
        </div>
    </div>

    <script>
        let allPhotos = [];
        let currentPhotoIndex = 0;

        document.addEventListener('DOMContentLoaded', () => {
            allPhotos = Array.from(document.querySelectorAll('.photo-item'));
        });

        function scrollCarousel(carouselId, direction) {
            const carousel = document.getElementById(carouselId);
            carousel.scrollBy({
                left: direction * 215,
                behavior: 'smooth'
            });
        }

        function openLightbox(groupIndex, indexInGroup) {
            currentPhotoIndex = allPhotos.findIndex((el, i) => el === event.currentTarget);
            updateLightboxContent();
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function changeImage(direction) {
            currentPhotoIndex += direction;
            if (currentPhotoIndex < 0) currentPhotoIndex = allPhotos.length - 1;
            if (currentPhotoIndex >= allPhotos.length) currentPhotoIndex = 0;
            updateLightboxContent();
        }

        function updateLightboxContent() {
            const photo = allPhotos[currentPhotoIndex];
            document.getElementById('lightboxImage').src = photo.dataset.src;
            document.getElementById('lightboxCounter').textContent =
                `${currentPhotoIndex + 1} / ${allPhotos.length}`;
            document.getElementById('lightboxCaption').textContent =
                photo.dataset.time ?? '';
        }

        document.addEventListener('keydown', (e) => {
            if (!document.getElementById('lightbox').classList.contains('active')) return;

            if (e.key === 'ArrowLeft') changeImage(-1);
            if (e.key === 'ArrowRight') changeImage(1);
            if (e.key === 'Escape') closeLightbox();
        });

        document.getElementById('lightbox').addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') closeLightbox();
        });
    </script>

    </body>
@endsection
