<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Produk - KoperaSiswa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --secondary: #a855f7;
            --accent: #f43f5e;
            --bg-light: #fdfdff;
            --text-dark: #0f172a;
            --text-gray: #64748b;
            --white: #ffffff;
            --grad: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.1);
            --shadow-lg: 0 20px 25px -5px rgba(99, 102, 241, 0.1);
            --radius: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-light); 
            color: var(--text-dark); 
            line-height: 1.6; 
            overflow-x: hidden;
            padding-top: 100px;
        }
        .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }

        /* NAVIGATION */
        .navbar { 
            position: fixed; top: 20px; left: 50%; transform: translateX(-50%);
            width: 90%; max-width: 1100px;
            background: rgba(255, 255, 255, 0.7); 
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            z-index: 1000; padding: 0.7rem 1.5rem; 
            border-radius: 24px; border: 1px solid rgba(255,255,255,0.4);
            box-shadow: var(--shadow-md);
            display: flex; justify-content: space-between; align-items: center;
        }
        .logo-text h1 { font-size: 1.4rem; font-weight: 800; letter-spacing: -1px; }
        .logo-text span { background: var(--grad); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        .nav-links { display: flex; gap: 25px; align-items: center; }
        .nav-links a { 
            text-decoration: none; color: var(--text-dark); 
            font-weight: 600; font-size: 0.9rem; transition: 0.3s; 
            opacity: 0.8;
        }
        .nav-links a:hover { color: var(--primary); opacity: 1; transform: translateY(-1px); }

        /* PAGE HEADER */
        .page-header {
            text-align: center;
            padding: 2rem 0 3rem;
        }
        .page-header h2 {
            font-size: 2.2rem;
            font-weight: 800;
        }
        .page-header .total-products {
            color: var(--text-gray);
            margin-top: 10px;
        }

        /* PRODUCT CARDS */
        .products-grid { 
            display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 2.5rem; padding: 2rem 0 6rem; 
        }
        .product-card { 
            background: var(--white); border-radius: 28px; overflow: hidden; 
            border: 1px solid rgba(226, 232, 240, 0.6); transition: 0.4s; 
        }
        .product-card:hover { transform: translateY(-12px); box-shadow: var(--shadow-lg); }
        .product-image-wrapper { height: 220px; position: relative; overflow: hidden; }
        .product-image { width: 100%; height: 100%; object-fit: cover; transition: 0.6s; }
        .product-card:hover .product-image { transform: scale(1.1); }
        
        .product-info { padding: 1.8rem; }
        .price-tag { color: var(--primary); font-weight: 800; font-size: 1.4rem; margin-bottom: 1.5rem; display: block; }
        
        .btn-order-now { 
            background: var(--grad); color: white; padding: 14px; border-radius: 14px; 
            display: flex; align-items: center; justify-content: center; gap: 8px; 
            text-decoration: none; font-weight: 700; transition: 0.3s;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }
        .btn-order-now:hover { transform: scale(1.02); opacity: 0.9; }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 40px 0;
        }
        .pagination a, .pagination span {
            padding: 10px 15px;
            background: white;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            transition: 0.3s;
        }
        .pagination a:hover {
            background: var(--primary);
            color: white;
        }
        .pagination .active {
            background: var(--grad);
            color: white;
        }

        /* FILTER SECTION */
        .filter-section {
            background: white;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-sm);
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }
        .filter-section select, .filter-section input {
            padding: 10px 15px;
            border: 2px solid #f1f5f9;
            border-radius: 10px;
            font-family: inherit;
            min-width: 200px;
        }
        .filter-section select:focus, .filter-section input:focus {
            outline: none;
            border-color: var(--primary);
        }

        /* FOOTER */
        .footer-main { background: #0b0f1a; color: #94a3b8; padding: 6rem 0 2rem; margin-top: 5rem; }
        .footer-grid { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.2fr; gap: 3rem; margin-bottom: 4rem; }
        .footer-logo-f h2 { color: white; font-weight: 800; font-size: 1.8rem; margin-bottom: 1rem; }
        .footer-logo-f span { background: var(--grad); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .footer-links ul { list-style: none; }
        .footer-links ul li { margin-bottom: 12px; }
        .footer-links ul li a { color: #94a3b8; text-decoration: none; transition: 0.3s; font-size: 0.9rem; }
        .footer-links ul li a:hover { color: white; padding-left: 8px; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.05); padding-top: 2rem; display: flex; justify-content: space-between; font-size: 0.85rem; }

        @media (max-width: 768px) {
            .filter-section { flex-direction: column; align-items: stretch; }
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; gap: 1rem; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo-text"><h1>Kopera<span>Siswa.</span></h1></div>
        <div class="nav-links">
            <a href="{{ route('product.index') }}"><i class="fas fa-home"></i> Home</a>
            <a href="{{ route('products.all') }}"><i class="fas fa-shopping-bag"></i> Semua Produk</a>
            <a href="#cara-kerja"><i class="fas fa-play-circle"></i> Cara Kerja</a>
            <a href="{{ route('product.index') }}#pendaftaran" class="btn-primary" style="padding: 10px 20px; font-size: 0.85rem; background: var(--grad); color: white; border-radius: 16px; text-decoration: none;"><i class="fas fa-user-plus"></i> Daftar Jualan</a>
        </div>
    </nav>

    <main class="container">
        <div class="page-header">
            <h2>Semua Produk Siswa</h2>
            <p class="total-products">Menampilkan {{ $products->count() }} produk dari siswa SMK 6 Balikpapan</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <i class="fas fa-filter" style="color: var(--text-gray);"></i>
            <span style="font-weight: 600;">Filter:</span>
            
            <select id="categoryFilter" onchange="filterProducts()">
                <option value="">Semua Kategori</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Aksesoris">Aksesoris</option>
                <option value="Jasa">Jasa / Digital</option>
            </select>

            <input type="text" id="searchInput" placeholder="Cari produk..." onkeyup="filterProducts()">
            
            <select id="sortFilter" onchange="filterProducts()">
                <option value="terbaru">Terbaru</option>
                <option value="termurah">Harga Termurah</option>
                <option value="termahal">Harga Termahal</option>
            </select>
        </div>

        <!-- Products Grid -->
        <div class="products-grid" id="productsGrid">
            @forelse($products as $p)
            <article class="product-card" data-category="{{ $p->category }}" data-price="{{ $p->price }}" data-name="{{ $p->product_name }}">
                <div class="product-image-wrapper">
                    <a href="{{ route('product.show', $p->id) }}">
                        <img src="{{ asset('storage/products/' . $p->image) }}" class="product-image" alt="{{ $p->product_name }}">
                    </a>
                </div>
                <div class="product-info">
                    <span style="font-size: 0.7rem; text-transform: uppercase; font-weight: 700; color: var(--text-gray);">{{ $p->category }}</span>
                    <h3 style="margin: 5px 0 10px; font-size: 1.2rem;">{{ $p->product_name }}</h3>
                    <span class="price-tag">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                    
                    <a href="{{ route('product.show', $p->id) }}" class="btn-order-now">
                        <i class="fas fa-shopping-cart"></i> Detail & Order via WA
                    </a>
                </div>
            </article>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 4rem; background: white; border-radius: 24px;">
                <i class="fas fa-box-open" style="font-size: 3rem; color: #e2e8f0; margin-bottom: 1rem;"></i>
                <p style="color: var(--text-gray);">Belum ada produk yang diposting.</p>
            </div>
            @endforelse
        </div>
    </main>

    <footer class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <div class="footer-logo-f"><h2>Kopera<span>Siswa.</span></h2></div>
                    <p style="font-size: 0.9rem;">Wadah resmi kreatifitas siswa SMK 6 Balikpapan.</p>
                </div>
                <div class="footer-links">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ route('product.index') }}">Home</a></li>
                        <li><a href="{{ route('products.all') }}">Semua Produk</a></li>
                        <li><a href="#cara-kerja">Cara Berjualan</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Bantuan</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Sosial Media</h4>
                    <p style="font-size: 0.9rem;">Ikuti kami untuk update produk terbaru siswa.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 KoperaSiswa. SMK 6 Balikpapan.</p>
            </div>
        </div>
    </footer>

    <script>
        function filterProducts() {
            const category = document.getElementById('categoryFilter').value.toLowerCase();
            const search = document.getElementById('searchInput').value.toLowerCase();
            const sort = document.getElementById('sortFilter').value;
            
            const products = document.querySelectorAll('.product-card');
            let productsArray = Array.from(products);

            // Filter
            productsArray.forEach(product => {
                let show = true;
                
                if (category && product.dataset.category.toLowerCase() !== category) {
                    show = false;
                }
                
                if (search && !product.dataset.name.toLowerCase().includes(search)) {
                    show = false;
                }
                
                product.style.display = show ? 'block' : 'none';
            });

            // Sort
            if (sort === 'termurah') {
                productsArray.sort((a, b) => a.dataset.price - b.dataset.price);
            } else if (sort === 'termahal') {
                productsArray.sort((a, b) => b.dataset.price - a.dataset.price);
            } else {
                // Default: berdasarkan urutan asli (terbaru)
                return;
            }

            // Reorder DOM
            const grid = document.getElementById('productsGrid');
            productsArray.forEach(product => {
                grid.appendChild(product);
            });
        }
    </script>

</body>
</html>