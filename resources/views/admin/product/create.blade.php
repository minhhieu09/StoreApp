@extends('admin.nav-dashboard')
@section('dashboard')
<!-- Main Content -->
<main class="main-content">
    <div class="page-header">
        <div>
            <h1>Thêm Sản Phẩm Mới</h1>
            <div class="breadcrumb">
                <a href="#dashboard">Dashboard</a>
                <span>/</span>
                <a href="{{route('adminProduct')}}">Sản phẩm</a>
                <span>/</span>
                <span>Thêm mới</span>
            </div>
        </div>
    </div>

    <form method="post" action="{{route('storeProduct')}}" class="form-container" id="addProductForm">
        <!-- Basic Information -->
        @csrf
        <div class="form-section">
            <h3 class="section-title">Thông Tin Cơ Bản</h3>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label required">Tên Sản Phẩm</label>
                    <input type="text" class="form-input" placeholder="Nhập tên sản phẩm" name="name" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label required">Giá (VNĐ)</label>
                    <input type="number" class="form-input" placeholder="0" name="price">
                    <span class="helper-text">Nhập giá bán sản phẩm</span>
                </div>
                <div class="form-group">
                    <label class="form-label">Giá Khuyến Mãi (VNĐ)</label>
                    <input type="number" class="form-input" placeholder="0" name="sale_price">
                    <span class="helper-text">Để trống nếu không có khuyến mãi</span>
                </div>
            </div>

            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">Mô Tả Chi Tiết</label>
                    <textarea class="form-textarea" placeholder="Nhập mô tả chi tiết về sản phẩm" style="min-height: 200px;" name="description"></textarea>
                </div>
            </div>
        </div>

        <!-- Product Images -->
        <div class="form-section">
            <h3 class="section-title">Hình Ảnh Sản Phẩm</h3>

            <div class="image-upload-area" onclick="document.getElementById('imageUpload').click()">
                <div class="upload-icon">📷</div>
                <p class="upload-text">Nhấn để tải ảnh lên</p>
                <p class="upload-hint">PNG, JPG, GIF tối đa 5MB</p>
            </div>
            <input type="file" id="imageUpload" multiple accept="image/*" style="display: none;">

            <div class="image-preview" id="imagePreview">
                <!-- Preview images will appear here -->
            </div>
        </div>

        <!-- Additional Information -->
        <div class="form-section">
            <h3 class="section-title">Thông Tin Bổ Sung</h3>

            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">Trạng Thái</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="status" value="active" checked>
                            <span>Hoạt động</span>
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="status" value="inactive">
                            <span>Ngừng bán</span>
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="#products" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
        </div>
    </form>
</main>
@endsection
