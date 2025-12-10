// Lấy navbar
const navbar = document.getElementById('mainNavbar');
const navbarHeight = navbar.offsetHeight;

// Lắng nghe sự kiện scroll
window.addEventListener('scroll', function () {
    if (window.scrollY > 100) { // Scroll xuống 100px
        navbar.classList.add('navbar-fixed');

        // Thêm placeholder để tránh content bị nhảy
        if (!document.querySelector('.navbar-placeholder')) {
            const placeholder = document.createElement('div');
            placeholder.className = 'navbar-placeholder';
            placeholder.style.height = navbarHeight + 'px';
            navbar.parentNode.insertBefore(placeholder, navbar);
        }
    } else {
        navbar.classList.remove('navbar-fixed');

        // Xóa placeholder
        const placeholder = document.querySelector('.navbar-placeholder');
        if (placeholder) {
            placeholder.remove();
        }
    }
});

// Add smooth scroll behavior
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Add click animation to project cards
document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('click', function() {
        this.style.transform = 'scale(0.98)';
        setTimeout(() => {
            this.style.transform = '';
        }, 200);
    });
});

