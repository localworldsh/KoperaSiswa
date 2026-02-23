<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: sans-serif; background: #f4f7ff; padding: 50px; }
        .card { background: white; max-width: 500px; margin: auto; padding: 20px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        .btn-save { background: #4361ee; color: white; border: none; width: 100%; padding: 10px; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Edit Produk</h2>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="text" name="fullName" value="{{ $product->seller_name }}" placeholder="Nama Penjual">
            <input type="text" name="class" value="{{ $product->seller_class }}" placeholder="Kelas">
            <input type="text" name="phone" value="{{ $product->phone }}" placeholder="WA">
            <input type="text" name="productName" value="{{ $product->product_name }}" placeholder="Nama Produk">
            <input type="number" name="price" value="{{ $product->price }}" placeholder="Harga">
            <select name="category">
                <option value="Makanan" {{ $product->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ $product->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="Aksesoris" {{ $product->category == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                <option value="Jasa/Digital" {{ $product->category == 'Jasa/Digital' ? 'selected' : '' }}>Jasa/Digital</option>
            </select>
            <textarea name="description">{{ $product->description }}</textarea>
            <p style="font-size: 12px; color: gray;">Upload foto baru jika ingin ganti:</p>
            <input type="file" name="image">
            <button type="submit" class="btn-save">Simpan Perubahan</button>
            <a href="/" style="display:block; text-align:center; margin-top:10px; color:gray;">Batal</a>
        </form>
    </div>
</body>
</html>