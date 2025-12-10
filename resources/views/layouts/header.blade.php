<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @stack('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg theme-navbar" id="mainNavbar">
        <div class="container banner-link">
            <a class="navbar-brand text-light" href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" style="width: 60px"
                                                             alt="">Bear Shop</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <a href="" class="nav-link">Trang Chủ</a>
                <a href="{{url('/category')}}" class="nav-link">Giới Thiệu</a>
                <a href="" class="nav-link">Dự Án</a>
                <a href="" class="nav-link">Blog</a>
                <a href="" class="nav-link">Liên Hệ</a>
            </div>
        </div>
    </nav>
    <section class="hero-section">
        <div class="container">
            <h1>Gioi thieu</h1>
            <nav>
                <a href="" class="text-decoration-none text-light"><i class="fa-solid fa-house"></i>Bear Shop</a>
            </nav>
        </div>
    </section>
</header>
</body>
</html>
