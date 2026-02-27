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

        /* Tombol Kembali */
        .btn-back {
            display: flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.95rem;
            padding: 8px 16px;
            border-radius: 30px;
            border: 1px solid rgba(0,0,0,0.1);
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-back:hover {
            background: rgba(0,0,0,0.02);
            border-color: var(--primary);
            color: var(--primary);
            transform: translateX(-3px);
        }

        /* Button Primary */
        .btn-primary { 
            background: var(--grad); color: white; padding: 14px 36px; 
            border-radius: 16px; text-decoration: none; font-weight: 700; 
            display: inline-block; transition: 0.4s; border: none; cursor: pointer;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);
        }
        .btn-primary:hover { 
            transform: translateY(-3px) scale(1.02); 
            box-shadow: 0 15px 30px -5px rgba(99, 102, 241, 0.5); 
        }

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

        /* ========== FOOTER STYLES ========== */
        .footer-main {
            background: #0b0f1a;
            color: #94a3b8;
            position: relative;
            margin-top: 5rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Wave Effect */
        .footer-wave {
            position: absolute;
            top: -1px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .footer-wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 60px;
        }

        /* Footer Grid */
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr;
            gap: 3rem;
            padding: 5rem 0 3rem;
            position: relative;
            z-index: 2;
        }

        /* Footer Logo */
        .footer-logo-f h2 {
            color: white;
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            letter-spacing: -1px;
        }

        .footer-logo-f span {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-description {
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            color: #94a3b8;
        }

        /* Footer Titles */
        .footer-title {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1.8rem;
            position: relative;
            padding-bottom: 0.8rem;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            border-radius: 3px;
        }

        /* Footer Menu */
        .footer-menu {
            list-style: none;
            padding: 0;
        }

        .footer-menu li {
            margin-bottom: 0.8rem;
        }

        .footer-menu li a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .footer-menu li a i {
            font-size: 0.7rem;
            color: #6366f1;
            transition: all 0.3s ease;
        }

        .footer-menu li a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-menu li a:hover i {
            transform: translateX(3px);
        }

        /* Contact Items */
        .footer-contact {
            margin-bottom: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .contact-item i {
            color: #6366f1;
            font-size: 1.1rem;
            margin-top: 3px;
        }

        .contact-item span {
            color: #94a3b8;
            line-height: 1.5;
        }

        /* Statistics */
        .footer-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 2rem 0;
            padding: 1rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #64748b;
            margin-top: 0.3rem;
        }

        /* Newsletter */
        .footer-newsletter {
            margin-top: 1.5rem;
        }

        .footer-newsletter h5 {
            color: white;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .newsletter-form {
            display: flex;
            gap: 0.5rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            color: white;
            font-family: inherit;
            font-size: 0.9rem;
        }

        .newsletter-form input::placeholder {
            color: #64748b;
        }

        .newsletter-form input:focus {
            outline: none;
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.1);
        }

        .newsletter-form button {
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            border: none;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }

        /* Divider */
        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            margin: 2rem 0;
        }

        /* Footer Bottom */
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 2rem;
            font-size: 0.85rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .copyright p {
            color: #64748b;
        }

        .copyright strong {
            color: white;
            font-weight: 700;
        }

        .developer-credit p {
            color: #64748b;
        }

        .developer-credit a {
            color: #a855f7;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .developer-credit a:hover {
            color: #6366f1;
            text-decoration: underline;
        }

        .footer-badges {
            display: flex;
            gap: 1rem;
        }

        .badge {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.3rem 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            color: #94a3b8;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge i {
            color: #6366f1;
            font-size: 0.7rem;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            text-decoration: none;
            box-shadow: 0 5px 20px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .filter-section { flex-direction: column; align-items: stretch; }
            
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .footer-badges {
                justify-content: center;
            }

            .back-to-top {
                bottom: 20px;
                right: 20px;
            }
        }

        @media (max-width: 480px) {
            .footer-wave svg {
                height: 30px;
            }
            
            .footer-title::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer-title {
                text-align: center;
            }
            
            .footer-menu li a {
                justify-content: center;
            }
            
            .contact-item {
                justify-content: center;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <!-- Tombol Kembali di pojok kiri -->
        <a href="javascript:history.back()" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        
        <!-- Logo di tengah (tetap ada) -->
        <div class="logo-text"><h1>Kopera<span>Siswa</span></h1></div>
        
        <!-- Tombol Daftar Jualan di pojok kanan -->

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

    <!-- ========== FOOTER DIPERBARUI ========== -->
    <footer class="footer-main">
        <!-- Wave Effect Atas -->
        <div class="footer-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#0b0f1a" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            </svg>
        </div>

        <div class="container">
            <div class="footer-grid">
                <!-- Kolom 1: Logo & Deskripsi -->
                <div class="footer-column footer-about">
                    <div class="footer-logo-f">
                        <h2>Kopera<span>Siswa</span></h2>
                    </div>
                    <p class="footer-description">
                        Platform digital khusus siswa SMK Negeri 6 Balikpapan untuk mengembangkan jiwa wirausaha melalui jual beli produk kreatif.
                    </p>
                    <!-- Ikon media sosial telah dihapus -->
                </div>

                <!-- Kolom 2: Navigasi Cepat -->
                <div class="footer-column">
                    <h4 class="footer-title">Navigasi Cepat</h4>
                    <ul class="footer-menu">
                        <li><a href="{{ route('product.index') }}"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="{{ route('product.index') }}#produk"><i class="fas fa-chevron-right"></i> Produk Terbaru</a></li>
                        <li><a href="{{ route('products.all') }}"><i class="fas fa-chevron-right"></i> Semua Produk</a></li>
                        <li><a href="{{ route('product.index') }}#cara-kerja"><i class="fas fa-chevron-right"></i> Cara Berjualan</a></li>
                        <li><a href="{{ route('product.index') }}#pendaftaran"><i class="fas fa-chevron-right"></i> Daftar Jualan</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak & Statistik (Email dihapus) -->
                <div class="footer-column">
                    <h4 class="footer-title">Kontak & Statistik</h4>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>SMK Negeri 6 Balikpapan</span>
                        </div>
                        <!-- Bagian email telah dihapus -->
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>628567895990 / 6281255593826</span>
                        </div>
                    </div>
                    
                    <!-- Statistik -->
                    <div class="footer-stats">
                        <div class="stat-item">
                            <div class="stat-number" id="productCount">0</div>
                            <div class="stat-label">Total Produk</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" id="sellerCount">0</div>
                            <div class="stat-label">Penjual Aktif</div>
                        </div>
                    </div>

                    <!-- Newsletter -->

                </div>
            </div>

            <!-- Divider -->
            <div class="footer-divider"></div>

            <!-- Footer Bottom dengan Credit Links -->
            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} <strong>KoperaSiswa</strong>. SMK Negeri 6 Balikpapan. All rights reserved.</p>
                </div>
                <div class="developer-credit">
                    <p>Developed with <i class="fas fa-heart" style="color: #f43f5e;"></i> by <a href="#" target="_blank">Tim A&R MKN 6 Balikpapan</a></p>
                </div>
                <div class="footer-badges">
                    <span class="badge"><i class="fas fa-shield-alt"></i> Aman</span>
                    <span class="badge"><i class="fas fa-bolt"></i> Cepat</span>
                    <span class="badge"><i class="fas fa-hand-holding-heart"></i> Gratis</span>
                </div>
            </div>
        </div>

        <!-- Back to Top Button -->
        <a href="#" class="back-to-top" id="backToTop">
            <i class="fas fa-arrow-up"></i>
        </a>
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

        // Back to Top Button
        window.addEventListener('scroll', function() {
            var backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // Smooth scroll untuk back to top
        document.getElementById('backToTop').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Animasi angka statistik
        function animateNumber(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                element.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Set statistik
        document.addEventListener('DOMContentLoaded', function() {
            animateNumber(document.getElementById('productCount'), 0, {{ $products->count() ?? 0 }}, 2000);
            animateNumber(document.getElementById('sellerCount'), 0, {{ $products->unique('seller_name')->count() ?? 0 }}, 2000);
        });
    </script>

</body>
</html>