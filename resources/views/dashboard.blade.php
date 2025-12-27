<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">cd
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <h2>Admin Panel</h2>
        <p>Quản lý hệ thống</p>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-item">
            <a href="#" class="active">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li class="menu-item">
            <a href="#">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Sản phẩm
            </a>
        </li>
        <li class="menu-item">
            <a href="#">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Đơn hàng
            </a>
        </li>
        <li class="menu-item">
            <a href="#">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Khách hàng
            </a>
        </li>
        <li class="menu-item">
            <a href="#">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Cài đặt
            </a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Header -->
    <div class="admin-header">
        <h1>Quản lý sản phẩm</h1>
        <div class="header-actions">
            <button class="btn btn-primary" onclick="openModal()">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
                Thêm sản phẩm
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="filters">
        <div class="search-box">
            <input type="text" placeholder="Tìm kiếm sản phẩm..." id="searchInput">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <select class="filter-select" id="categoryFilter">
            <option value="">Tất cả danh mục</option>
            <option value="account">Tài khoản</option>
            <option value="product">Sản phẩm</option>
        </select>
        <select class="filter-select" id="statusFilter">
            <option value="">Tất cả trạng thái</option>
            <option value="active">Hoạt động</option>
            <option value="inactive">Ngừng bán</option>
        </select>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody id="productTable">
            @foreach($product as $item)
                <tr>
                    <td>
                        <div class="product-title">
                            <img src="https://via.placeholder.com/60/f093fb/ffffff?text=📁" alt="Product"
                                 class="product-image">
                            <span class="product-title-text">{{$item->name}}</span>
                        </div>
                    </td>
                    <td><span class="badge badge-product">Sản phẩm</span></td>
                    <td><span class="price">{{$item->price}}</span></td>
                    <td><span class="badge badge-inactive">{{$item->status}}</span></td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <div class="actions">
                            <button class="action-btn btn-edit" onclick="editProduct(3)">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button class="action-btn btn-delete" onclick="deleteProduct(3)">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <button disabled>Trước</button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>Sau</button>
    </div>
</div>

<!-- Modal Add/Edit Product -->
<div class="modal" id="productModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Thêm sản phẩm mới</h2>
            <button class="close-btn" onclick="closeModal()">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                     style="width: 20px; height: 20px;">
                    <path d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <form id="productForm">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" id="productName" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select id="productCategory" required>
                        <option value="">Chọn danh mục</option>
                        <option value="account">Tài khoản</option>
                        <option value="product">Sản phẩm</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Giá (VNĐ)</label>
                    <input type="number" id="productPrice" placeholder="0" required>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea id="productDescription" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select id="productStatus" required>
                        <option value="active">Hoạt động</option>
                        <option value="inactive">Ngừng bán</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh URL</label>
                    <input type="text" id="productImage" placeholder="https://example.com/image.jpg">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal()">Hủy</button>
            <button class="btn btn-primary" onclick="saveProduct()">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 13l4 4L19 7"/>
                </svg>
                Lưu sản phẩm
            </button>
        </div>
    </div>
</div>
</body>
</html>
