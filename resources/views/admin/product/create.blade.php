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

    <form method="post" action="{{route('storeProduct')}}" class="form-container" id="addProductForm" enctype="multipart/form-data">
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
            <input type="file" id="imageUpload" multiple accept="image/*" style="display: none;" name="image">

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        if (!imageUpload || !imagePreview) {
            console.error('Không tìm thấy elements');
            return;
        }

        imageUpload.addEventListener('change', function(e) {
            const files = e.target.files;
            imagePreview.innerHTML = '';

            if (files.length === 0) return;

            Array.from(files).forEach((file) => {
                // Kiểm tra file có phải là ảnh không
                if (!file.type.startsWith('image/')) {
                    alert(`File ${file.name} không phải là ảnh!`);
                    return;
                }

                // Kiểm tra kích thước file (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert(`File ${file.name} vượt quá 5MB!`);
                    return;
                }

                // Tạo FileReader để đọc file
                const reader = new FileReader();

                reader.onload = function(event) {
                    // Tạo wrapper cho mỗi ảnh
                    const imageWrapper = document.createElement('div');
                    imageWrapper.className = 'image-item';

                    // Tạo img element
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.alt = file.name;

                    // Tạo nút xóa
                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'remove-image';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.type = 'button';
                    removeBtn.onclick = function() {
                        imageWrapper.remove();
                        // Reset input nếu không còn ảnh nào
                        if (imagePreview.children.length === 0) {
                            imageUpload.value = '';
                        }
                    };

                    // Tạo tên file
                    const fileName = document.createElement('p');
                    fileName.className = 'image-name';
                    fileName.textContent = file.name;

                    // Ghép các element
                    imageWrapper.appendChild(img);
                    imageWrapper.appendChild(removeBtn);
                    imageWrapper.appendChild(fileName);
                    imagePreview.appendChild(imageWrapper);
                };

                // Đọc file dưới dạng Data URL
                reader.readAsDataURL(file);
            });
        });
    });
</script>

<style>
    .image-preview {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .image-item {
        position: relative;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 10px;
        background: #f9f9f9;
        transition: all 0.3s ease;
    }

    .image-item:hover {
        border-color: #007bff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .image-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 4px;
        display: block;
    }

    .remove-image {
        position: absolute;
        top: 5px;
        right: 5px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: none;
        background: rgba(255, 0, 0, 0.8);
        color: white;
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        line-height: 1;
    }

    .remove-image:hover {
        background: rgba(255, 0, 0, 1);
        transform: scale(1.1);
    }

    .image-name {
        margin: 8px 0 0 0;
        font-size: 12px;
        color: #666;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .image-upload-area {
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-upload-area:hover {
        border-color: #007bff;
        background: #f0f8ff;
    }

    .upload-icon {
        font-size: 48px;
        margin-bottom: 10px;
    }

    .upload-text {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin: 10px 0 5px 0;
    }

    .upload-hint {
        font-size: 13px;
        color: #666;
        margin: 0;
    }
</style>
