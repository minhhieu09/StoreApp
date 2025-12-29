@extends('admin.nav-dashboard')
@section('dashboard')
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
                <a style="color: white;text-decoration: none" href="{{route('createProduct')}}">Thêm sản phẩm</a>
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
                            <a href="{{ route('editProduct', $item->id) }}" class="action-btn btn-edit" onclick="editProduct(3)" >
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('deleteProduct', $item->id) }}" method="DELETE" style="display: inline;" onsubmit="return confirmDelete('{{ $item->name }}')">
                                @csrf
                                <button type="submit" class="action-btn btn-delete" title="Xóa sản phẩm">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        {{-- Nút Trước --}}
        @if ($product->onFirstPage())
            <button disabled>Trước</button>
        @else
            <a href="{{ $product->appends(request()->query())->previousPageUrl() }}">
                <button>Trước</button>
            </a>
        @endif

        {{-- Các số trang --}}
        @foreach ($product->getUrlRange(1, $product->lastPage()) as $page => $url)
            @if ($page == $product->currentPage())
                <button class="active">{{ $page }}</button>
            @else
                <a href="{{ $product->appends(request()->query())->url($page) }}">
                    <button>{{ $page }}</button>
                </a>
            @endif
        @endforeach

        {{-- Nút Sau --}}
        @if ($product->hasMorePages())
            <a href="{{ $product->appends(request()->query())->nextPageUrl() }}">
                <button>Sau</button>
            </a>
        @else
            <button disabled>Sau</button>
        @endif
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
@endsection
