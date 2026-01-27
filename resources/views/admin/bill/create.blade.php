<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ảnh</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input[type="file"] { width: 100%; padding: 10px; border: 2px dashed #ddd; border-radius: 4px; cursor: pointer; }
        input[type="file"]:hover { border-color: #4CAF50; }
        .preview { margin-top: 15px; max-width: 100%; }
        .preview img { max-width: 100%; height: auto; border-radius: 4px; border: 1px solid #ddd; }
        .btn { padding: 12px 30px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .btn:hover { background: #45a049; }
        .btn-secondary { background: #777; margin-left: 10px; }
        .btn-secondary:hover { background: #666; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
<div class="container">
    <h1>Upload Ảnh Mới</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul style="margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('storeImage')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="image">Chọn ảnh:</label>
            <input type="file" name="image" id="image" accept="image/*" required onchange="previewImage(event)">
        </div>

        <div class="preview" id="preview"></div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn">Upload Ảnh</button>
            <a href="{{route('bill')}}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>
