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

    <!-- Timeline Section 1 -->
    <div class="timeline-section">
        <div class="timeline-header">
            <div class="timeline-date">Hôm nay</div>
            <div class="timeline-line"></div>
        </div>
        <div class="photo-carousel-wrapper">
            <button class="carousel-btn carousel-btn-prev" onclick="scrollCarousel('carousel1', -1)">‹</button>
            <div class="photo-carousel" id="carousel1"></div>
            <button class="carousel-btn carousel-btn-next" onclick="scrollCarousel('carousel1', 1)">›</button>
        </div>
    </div>

    <!-- Timeline Section 2 -->
    <div class="timeline-section">
        <div class="timeline-header">
            <div class="timeline-date">Hôm qua</div>
            <div class="timeline-line"></div>
        </div>
        <div class="photo-carousel-wrapper">
            <button class="carousel-btn carousel-btn-prev" onclick="scrollCarousel('carousel2', -1)">‹</button>
            <div class="photo-carousel" id="carousel2"></div>
            <button class="carousel-btn carousel-btn-next" onclick="scrollCarousel('carousel2', 1)">›</button>
        </div>
    </div>

    <!-- Timeline Section 3 -->
    <div class="timeline-section">
        <div class="timeline-header">
            <div class="timeline-date">Tuần trước</div>
            <div class="timeline-line"></div>
        </div>
        <div class="photo-carousel-wrapper">
            <button class="carousel-btn carousel-btn-prev" onclick="scrollCarousel('carousel3', -1)">‹</button>
            <div class="photo-carousel" id="carousel3"></div>
            <button class="carousel-btn carousel-btn-next" onclick="scrollCarousel('carousel3', 1)">›</button>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">×</button>
            <img class="lightbox-image" id="lightboxImage" src="" alt="">
            <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">‹</button>
            <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">›</button>
            <div class="lightbox-info">
                <div class="lightbox-counter" id="lightboxCounter"></div>
                <div class="lightbox-caption" id="lightboxCaption"></div>
            </div>
        </div>
    </div>

    <script>
        // Sample photo data
        const photoData = {
            carousel1: [
                { id: 1, time: '14:30', caption: 'Bình minh trên biển' },
                { id: 2, time: '12:15', caption: 'Thành phố về đêm' },
                { id: 3, time: '10:45', caption: 'Thiên nhiên hoang dã' },
                { id: 4, time: '09:20', caption: 'Kiến trúc hiện đại' },
                { id: 5, time: '08:15', caption: 'Cầu cổ đẹp' },
                { id: 6, time: '07:30', caption: 'Ngôi làng yên bình' },
            ],
            carousel2: [
                { id: 7, time: '18:00', caption: 'Hoàng hôn trên núi' },
                { id: 8, time: '16:30', caption: 'Khu vườn mùa xuân' },
                { id: 9, time: '14:45', caption: 'Đường phố cổ' },
                { id: 10, time: '11:20', caption: 'Bãi biển nhiệt đới' },
                { id: 11, time: '09:15', caption: 'Rừng mùa thu' },
                { id: 12, time: '07:45', caption: 'Thác nước đẹp' },
                { id: 13, time: '06:30', caption: 'Hồ yên tĩnh' },
            ],
            carousel3: [
                { id: 14, time: '17:00', caption: 'Cầu cổ thanh bình' },
                { id: 15, time: '15:30', caption: 'Ngôi làng nhỏ' },
                { id: 16, time: '13:00', caption: 'Thác nước hùng vĩ' },
                { id: 17, time: '10:30', caption: 'Cánh đồng hoa' },
                { id: 18, time: '08:45', caption: 'Núi tuyết phủ' },
                { id: 19, time: '07:20', caption: 'Hồ phản chiếu' },
                { id: 20, time: '06:00', caption: 'Bình minh tuyệt đẹp' },
                { id: 21, time: '05:30', caption: 'Sương mù sớm mai' },
            ]
        };

        let allPhotos = [];
        let currentPhotoIndex = 0;

        // Scroll carousel
        function scrollCarousel(carouselId, direction) {
            const carousel = document.getElementById(carouselId);
            const scrollAmount = 215; // width of photo + gap
            carousel.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        // Generate photos for each carousel
        function generatePhotos() {
            Object.keys(photoData).forEach(carouselId => {
                const carousel = document.getElementById(carouselId);
                photoData[carouselId].forEach((photo, index) => {
                    const currentIndex = allPhotos.length; // Lưu index trước khi push
                    allPhotos.push(photo);

                    const photoItem = document.createElement('div');
                    photoItem.className = 'photo-item';
                    photoItem.innerHTML = `
                        <img src="https://picsum.photos/400/400?random=${photo.id}" alt="${photo.caption}">
                        <div class="photo-overlay">
                            <div class="photo-time">${photo.time}</div>
                        </div>
                    `;
                    photoItem.onclick = () => openLightbox(currentIndex);
                    carousel.appendChild(photoItem);
                });
            });
        }

        // Open lightbox
        function openLightbox(index) {
            currentPhotoIndex = index;
            const lightbox = document.getElementById('lightbox');
            updateLightboxContent();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close lightbox
        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Change image
        function changeImage(direction) {
            currentPhotoIndex += direction;
            if (currentPhotoIndex < 0) {
                currentPhotoIndex = allPhotos.length - 1;
            } else if (currentPhotoIndex >= allPhotos.length) {
                currentPhotoIndex = 0;
            }
            updateLightboxContent();
        }

        // Update lightbox content
        function updateLightboxContent() {
            const photo = allPhotos[currentPhotoIndex];
            document.getElementById('lightboxImage').src = `https://picsum.photos/1200/800?random=${photo.id}`;
            document.getElementById('lightboxCounter').textContent = `${currentPhotoIndex + 1} / ${allPhotos.length}`;
            document.getElementById('lightboxCaption').textContent = photo.caption;
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.classList.contains('active')) {
                if (e.key === 'ArrowLeft') {
                    changeImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeImage(1);
                } else if (e.key === 'Escape') {
                    closeLightbox();
                }
            }
        });

        // Close lightbox when clicking outside image
        document.getElementById('lightbox').addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') {
                closeLightbox();
            }
        });

        // Initialize
        generatePhotos();
    </script>
    </body>
@endsection
