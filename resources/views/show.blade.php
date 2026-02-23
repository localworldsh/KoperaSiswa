<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->product_name }} - KoperaSiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --text-dark: #0f172a;
            --text-gray: #64748b;
            --bg-light: #f8fafc;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg-light); color: var(--text-dark); margin: 0; padding: 0; }
        .nav-detail { background: white; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 20px; position: sticky; top: 0; z-index: 100; }
        .container { max-width: 1100px; margin: 30px auto; padding: 0 20px; display: grid; grid-template-columns: 1.2fr 1fr; gap: 40px; background: white; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.05); }
        .product-image-side img { width: 100%; height: 600px; object-fit: cover; }
        .product-info-side { padding: 50px; }
        .breadcrumb { font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px; }
        .badge-status { display: inline-block; background: #fff7ed; color: #ea580c; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 800; margin-bottom: 15px; }
        h1 { font-size: 2.5rem; margin: 0 0 10px 0; letter-spacing: -1px; }
        .price { font-size: 2.2rem; font-weight: 800; color: var(--primary); margin: 20px 0; }
        .desc-title { font-weight: 700; margin-bottom: 10px; display: flex; align-items: center; gap: 10px; }
        .description { line-height: 1.8; color: #475569; margin-bottom: 30px; }
        .seller-card { background: #f1f5f9; padding: 20px; border-radius: 20px; margin-bottom: 30px; }
        .btn-wa { display: flex; align-items: center; justify-content: center; gap: 10px; background: #25d366; color: white; text-decoration: none; padding: 18px; border-radius: 15px; font-weight: 700; transition: 0.3s; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2); }
        .btn-wa:hover { transform: translateY(-3px); background: #16a34a; }
        @media (max-width: 850px) {
            .container { grid-template-columns: 1fr; }
            .product-image-side img { height: 400px; }
            .product-info-side { padding: 30px; }
        }
    </style>
</head>
<body>

    <nav class="nav-detail">
        <a href="{{ route('product.index') }}" style="color: var(--text-dark); text-decoration: none; font-weight: 600;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <div style="font-weight: 800; font-size: 1.2rem;">Kopera<span>Siswa.</span></div>
    </nav>

    <div class="container">
        <div class="product-image-side">
            <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->product_name }}">
        </div>
        <div class="product-info-side">
            <span class="badge-status"><i class="fas fa-fire"></i> TERLARIS</span>
            <div class="breadcrumb">Home / {{ $product->category }} / {{ $product->product_name }}</div>
            <h1>{{ $product->product_name }}</h1>
            
            <div style="color: #fbbf24; font-size: 0.9rem;">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <span style="color: var(--text-gray); margin-left: 10px;">4.8/5 (42 ulasan)</span>
            </div>

            <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>

            <div class="seller-card">
                <div style="font-size: 0.8rem; color: var(--text-gray); margin-bottom: 5px;">Penjual:</div>
                <div style="font-weight: 700; font-size: 1.1rem;">{{ $product->seller_name }}</div>
                <div style="font-size: 0.85rem; color: var(--primary); font-weight: 600;">Kelas {{ $product->seller_class }}</div>
            </div>

            <div class="desc-title"><i class="fas fa-align-left"></i> Deskripsi Produk</div>
            <div class="description">
                {{ $product->description }}
            </div>

            <a href="https://wa.me/{{ $product->phone }}?text=Halo {{ $product->seller_name }}, saya mau beli {{ $product->product_name }}!" class="btn-wa" target="_blank">
                <i class="fab fa-whatsapp"></i> Chat Penjual Sekarang
            </a>
        </div>
    </div>

</body>
</html>