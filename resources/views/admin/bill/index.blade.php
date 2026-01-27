<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Ảnh</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { margin-bottom: 20px; color: #333; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn { padding: 10px 20px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px; display: inline-block; border: none; cursor: pointer; }
        .btn:hover { background: #45a049; }
        .btn-danger { background: #f44336; }
        .btn-danger:hover { background: #da190b; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .image-card { border: 1px solid #ddd; border-radius: 8px; overflow: hidden; background: #fafafa; }
        .image-card img { width: 100%; height: 200px; object-fit: cover; }
        .image-info { padding: 15px; }
        .image-info p { margin: 5px 0; color: #666; font-size: 14px; }
        .image-actions { display: flex; justify-content: space-between; margin-top: 10px; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .pagination { margin-top: 30px; display: flex; justify-content: center; gap: 5px; }
        .pagination a, .pagination span { padding: 8px 12px; border: 1px solid #ddd; text-decoration: none; color: #333; border-radius: 4px; }
        .pagination .active { background: #4CAF50; color: white; border-color: #4CAF50; }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Quản lý Ảnh</h1>
        <a href="{{route('createImage')}}" class="btn btn-success">+ Upload Ảnh Mới</a>
        <a href="{{route('adminProduct')}}" class="btn btn-primary">Quay lại</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($images->count() > 0)
        <div class="grid">
            @foreach($images as $image)
                <div class="image-card">
                    <img src="{{asset('storage/' . $image->path)}}" alt="{{$image->filename}}">
                    <div class="image-info">
{{--                        <p><strong>Tên:</strong> </p>--}}
                        <p><strong>Ngày tải: {{$image->created_at->format('d/m/Y H:i')}}</strong> </p>
                        <div class="image-actions">
                            <a href="{{asset('storage/' . $image->path)}}" target="_blank" class="btn btn-success">Xem</a>
                            <form action="{{route('deleteImage', $image->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa ảnh này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $images->links() }}
        </div>
    @else
        <p style="text-align: center; color: #999; padding: 50px 0;">Chưa có ảnh nào. Hãy upload ảnh đầu tiên!</p>
    @endif
</div>
</body>
</html>
