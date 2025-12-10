<footer>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Bắt đầu dự án với 4S Design</h1>
            <p class="hero-subtitle">Liên hệ với 4S Design để được tư vấn trực tiếp</p>
            <a href="#contact" class="hero-button">Liên hệ</a>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo & Company Info -->
            <div class="footer-logo-section">
                <div class="footer-logo">
                    <div class="logo-circle">
                        <svg width="50" height="50" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" fill="none" stroke="white" stroke-width="3"/>
                            <path d="M 30 50 Q 50 30, 70 50 Q 50 70, 30 50" fill="none" stroke="white" stroke-width="3"/>
                        </svg>
                    </div>
                    <div class="logo-text">4S DESIGN</div>
                    <div class="logo-subtitle">ARCHITECTURE & INTERIOR</div>
                </div>
            </div>

            <!-- Company Information -->
            <div class="footer-info">
                <h3>Công ty TNHH Xây dựng<br>kiến trúc & Nội thất 4S</h3>
                <div class="footer-info-item">
                    <i>📍</i>
                    <span>11/3 đường số 19, Hiệp Bình Phước, TP. Thủ Đức, TP. HCM</span>
                </div>
                <div class="footer-info-item">
                    <i>📞</i>
                    <div>
                        <a href="tel:0938789483">0938 789 483</a> - <a href="tel:0971727253">0971 727 253</a>
                    </div>
                </div>
                <div class="footer-info-item">
                    <i>✉️</i>
                    <a href="mailto:info@4sdesign.vn">info@4sdesign.vn</a>
                </div>
            </div>

            <!-- Links & Newsletter -->
            <div>
                <div class="footer-links">
                    <h3>Thông tin</h3>
                    <ul>
                        <li><a href="#about">Giới thiệu</a></li>
                        <li><a href="#contact">Liên hệ</a></li>
                        <li><a href="#process">Quy trình làm việc</a></li>
                        <li><a href="#news">Tin tức</a></li>
                    </ul>
                </div>

                <div class="footer-newsletter">
                    <h3>Đăng ký nhận báo giá</h3>
                    <p class="newsletter-text">Nhận báo giá mới từ 4S Design</p>
                    <form class="newsletter-form" onsubmit="return false;">
                        <input type="email" class="newsletter-input" placeholder="Email" required>
                        <button type="submit" class="newsletter-button">
                            <svg viewBox="0 0 24 24">
                                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                            </svg>
                        </button>
                    </form>
                    <div class="social-icons">
                        <div class="social-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright 2025 © 4S Design. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <svg viewBox="0 0 24 24">
            <path d="M7 14l5-5 5 5z"/>
        </svg>
    </div>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/84938789483" class="whatsapp-button" target="_blank">
        <svg viewBox="0 0 32 32">
            <path d="M16 0C7.164 0 0 7.164 0 16c0 2.828.736 5.484 2.024 7.792L0 32l8.396-2.024A15.926 15.926 0 0 0 16 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.36c-2.548 0-4.98-.712-7.032-1.952l-.504-.296-5.232 1.264 1.28-5.128-.324-.524A13.312 13.312 0 0 1 2.64 16c0-7.348 5.984-13.32 13.36-13.32 7.348 0 13.32 5.972 13.32 13.32 0 7.376-5.972 13.36-13.32 13.36zm7.32-9.996c-.4-.2-2.372-1.172-2.74-1.304-.368-.132-.636-.2-.904.2-.268.4-1.04 1.304-1.276 1.572-.236.268-.472.3-.872.1-.4-.2-1.688-.624-3.216-1.988-1.188-1.06-1.992-2.368-2.224-2.768-.236-.4-.024-.616.176-.816.18-.18.4-.472.6-.708.2-.236.268-.4.4-.668.132-.268.068-.5-.032-.7-.1-.2-.904-2.18-1.24-2.984-.328-.784-.66-.676-.904-.688-.236-.012-.504-.016-.772-.016s-.708.1-1.076.5c-.368.4-1.404 1.372-1.404 3.348s1.436 3.884 1.636 4.152c.2.268 2.824 4.312 6.844 6.048.956.412 1.704.66 2.288.844.96.304 1.836.26 2.528.156.772-.116 2.372-.972 2.708-1.908.336-.936.336-1.74.236-1.908-.1-.168-.368-.268-.768-.468z"/>
        </svg>
    </a>
</footer>
<script src="{{asset('js/index.js')}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>


</body>
</html>
