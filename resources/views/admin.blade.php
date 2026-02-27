<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Admin Dashboard - KoperaSiswa</title>
    
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

        html { scroll-behavior: smooth; }
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

        /* --- NAVIGATION --- */
        .navbar { 
            position: fixed; top: 20px; left: 50%; transform: translateX(-50%);
            width: 90%; max-width: 1100px;
            background: rgba(255, 255, 255, 0.7); 
            backdrop-filter: blur(12px) saturate(180%);
            z-index: 1000; padding: 0.7rem 1.5rem; 
            border-radius: 24px; border: 1px solid rgba(255,255,255,0.4);
            box-shadow: var(--shadow-md);
            display: flex; justify-content: space-between; align-items: center;
        }
        .logo-text h1 { font-size: 1.4rem; font-weight: 800; letter-spacing: -1px; }
        .logo-text span { background: var(--grad); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        .nav-links { display: flex; gap: 25px; align-items: center; }
        .admin-greet { 
            font-weight: 700; color: var(--primary); 
            background: #f0f2ff; padding: 8px 20px; border-radius: 12px;
            display: flex; align-items: center; gap: 8px;
        }

        /* --- HERO SECTION --- */
        .hero { 
            padding: 4rem 0 6rem; 
            background: radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 90% 80%, rgba(168, 85, 247, 0.05) 0%, transparent 50%);
            text-align: center; 
        }
        .hero-title { 
            font-size: clamp(2.5rem, 5vw, 4rem); 
            font-weight: 800; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -2px; 
        }

        /* --- FILTER SECTION --- */
        .filter-section {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
            border: 1px solid #f1f5f9;
        }

        .filter-section i {
            font-size: 1.2rem;
        }

        .filter-section select,
        .filter-section input[type="text"] {
            padding: 0.8rem 1.2rem;
            border-radius: 12px;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            font-family: inherit;
            font-size: 0.95rem;
            min-width: 180px;
            transition: all 0.3s ease;
        }

        .filter-section select:focus,
        .filter-section input[type="text"]:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .filter-section input[type="text"] {
            flex: 1;
            min-width: 250px;
        }

        .filter-stats {
            margin-left: auto;
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .filter-stats span {
            font-weight: 700;
            color: var(--primary);
        }

        /* --- PRODUCT CARDS --- */
        .products-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 2.5rem; 
            padding: 2rem 0 6rem; 
        }
        
        .product-card { 
            background: var(--white); 
            border-radius: 28px; 
            overflow: hidden; 
            border: 1px solid rgba(226, 232, 240, 0.6); 
            transition: 0.4s; 
            opacity: 1;
            transform: scale(1);
        }
        
        .product-card:hover { 
            transform: translateY(-12px); 
            box-shadow: var(--shadow-lg); 
        }
        
        .product-card.hidden {
            display: none;
        }
        
        .product-image-wrapper { 
            height: 220px; 
            position: relative; 
            overflow: hidden; 
        }
        
        .product-image { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: 0.6s; 
        }
        
        .product-info { 
            padding: 1.8rem; 
        }
        
        .price-tag { 
            color: var(--primary); 
            font-weight: 800; 
            font-size: 1.4rem; 
            margin-bottom: 1.5rem; 
            display: block; 
        }
        
        .action-group { 
            display: flex; 
            gap: 10px; 
            margin-top: 15px; 
        }
        
        .btn-edit { 
            flex: 1; 
            background: #6366f1; 
            color: white; 
            text-align: center; 
            padding: 12px; 
            border-radius: 12px; 
            text-decoration: none; 
            font-size: 0.85rem; 
            font-weight: 700; 
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .btn-delete { 
            flex: 1; 
            background: #fee2e2; 
            color: #f43f5e; 
            border: none; 
            padding: 12px; 
            border-radius: 12px; 
            cursor: pointer; 
            font-size: 0.85rem; 
            font-weight: 700; 
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .btn-edit:hover { 
            background: var(--primary-hover); 
            transform: translateY(-2px);
        }
        
        .btn-delete:hover { 
            background: #fecaca; 
            transform: translateY(-2px);
        }

        /* No Results Message */
        .no-results {
            grid-column: 1/-1;
            text-align: center;
            padding: 4rem;
            background: white;
            border-radius: 24px;
            border: 2px dashed #e2e8f0;
            display: none;
        }

        .no-results.show {
            display: block;
        }

        .no-results i {
            font-size: 3rem;
            color: #e2e8f0;
            margin-bottom: 1rem;
        }

        .no-results p {
            color: var(--text-gray);
            font-size: 1.1rem;
        }

        .no-results button {
            margin-top: 1.5rem;
            padding: 0.8rem 2rem;
            background: var(--grad);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .no-results button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
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
            body {
                padding-top: 80px;
            }

            .navbar {
                top: 10px;
                padding: 0.5rem 1rem;
            }

            .hero-title { 
                font-size: 2.2rem; 
            }

            .admin-text { 
                display: none; 
            }

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-section select,
            .filter-section input[type="text"] {
                width: 100%;
                min-width: auto;
            }

            .filter-stats {
                margin-left: 0;
                text-align: center;
            }
            
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
            .container {
                padding: 0 1rem;
            }

            .hero {
                padding: 2rem 0 3rem;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .action-group {
                flex-direction: column;
            }

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
        <div class="logo-text"><h1>Kopera<span>Siswa</span></h1></div>
        <div class="nav-links">
            <div class="admin-greet">
                <i class="fas fa-user-shield"></i>
                <span class="admin-text">Hi, Admin</span>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div style="position: fixed; top: 100px; right: 20px; z-index: 2000; background: #22c55e; color: white; padding: 15px 25px; border-radius: 12px; box-shadow: var(--shadow-lg); font-weight: 700;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    <script>setTimeout(() => { document.querySelector('[style*="fixed"]').remove(); }, 4000);</script>
    @endif

    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Dashboard <span style="color:var(--primary)">Manajemen</span> <br>Produk Siswa</h1>
            <p style="color: var(--text-gray); max-width: 600px; margin: 0 auto 1rem; font-size: 1.1rem;">Panel kontrol Admin untuk memantau, mengedit, dan menghapus produk yang tayang di aplikasi KoperaSiswa.</p>
        </div>
    </section>

    <main class="container" id="produk">
        <section style="padding-bottom: 5rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2rem; font-weight: 800; letter-spacing: -1px;">Daftar Produk Aktif</h2>
                <div style="width: 50px; height: 4px; background: var(--grad); margin: 10px auto; border-radius: 10px;"></div>
            </div>
            
            <!-- Filter Section -->
            <div class="filter-section">
                <i class="fas fa-filter" style="color: var(--text-gray);"></i>
                <span style="font-weight: 600;">Filter:</span>
                
                <select id="categoryFilter" onchange="filterProducts()">
                    <option value="all">Semua Kategori</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Aksesoris">Aksesoris</option>
                    <option value="Jasa">Jasa / Digital</option>
                </select>

                <input type="text" id="searchInput" placeholder="Cari produk atau penjual..." onkeyup="filterProducts()">
                
                <select id="sortFilter" onchange="filterProducts()">
                    <option value="terbaru">Terbaru</option>
                    <option value="termurah">Harga Termurah</option>
                    <option value="termahal">Harga Termahal</option>
                </select>

                <div class="filter-stats">
                    <i class="fas fa-box"></i> <span id="visibleCount">0</span>/<span id="totalCount">{{ $products->count() }}</span> produk
                </div>
            </div>
            
            <div class="products-grid" id="productsGrid">
                @forelse($products as $index => $p)
                <article class="product-card" data-category="{{ $p->category }}" data-price="{{ $p->price }}" data-name="{{ strtolower($p->product_name) }}" data-seller="{{ strtolower($p->seller_name) }}" data-index="{{ $index }}">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('storage/products/' . $p->image) }}" class="product-image" alt="{{ $p->product_name }}">
                    </div>
                    <div class="product-info">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                            <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: var(--text-gray);">{{ $p->category }}</span>
                            <span style="font-size: 0.7rem; background: #f1f5f9; padding: 2px 8px; border-radius: 5px;">{{ $p->seller_class }}</span>
                        </div>
                        
                        <h3 style="margin: 0 0 5px; font-size: 1.1rem;">{{ $p->product_name }}</h3>
                        <p style="font-size: 0.85rem; color: var(--text-gray); margin-bottom: 10px;">Penjual: <strong>{{ $p->seller_name }}</strong></p>

                        <span class="price-tag">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                        
                        <div class="action-group">
                            <a href="{{ route('product.edit', $p->id) }}" class="btn-edit">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('product.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini secara permanen?')" style="flex:1;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="far fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
                @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 4rem; background: white; border-radius: 24px; border: 2px dashed #e2e8f0;">
                    <i class="fas fa-box-open" style="font-size: 3rem; color: #e2e8f0; margin-bottom: 1rem;"></i>
                    <p style="color: var(--text-gray);">Tidak ada produk untuk dikelola.</p>
                </div>
                @endforelse

                <!-- No Results Message -->
                <div class="no-results" id="noResults">
                    <i class="fas fa-search"></i>
                    <p>Tidak ada produk yang ditemukan</p>
                    <button onclick="resetFilters()">
                        <i class="fas fa-redo-alt"></i> Reset Filter
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- ========== FOOTER ========== -->
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
                </div>

                <!-- Kolom 2: Navigasi Cepat -->
                <div class="footer-column">
                    <h4 class="footer-title">Navigasi Cepat</h4>
                    <ul class="footer-menu">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="#produk"><i class="fas fa-chevron-right"></i> Produk Terbaru</a></li>
                        <li><a href="{{ route('products.all') }}"><i class="fas fa-chevron-right"></i> Semua Produk</a></li>
                        <li><a href="#cara-kerja"><i class="fas fa-chevron-right"></i> Cara Berjualan</a></li>
                        <li><a href="#pendaftaran"><i class="fas fa-chevron-right"></i> Daftar Jualan</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak & Statistik -->
                <div class="footer-column">
                    <h4 class="footer-title">Kontak & Statistik</h4>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>SMK Negeri 6 Balikpapan</span>
                        </div>
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
                </div>
            </div>

            <!-- Divider -->
            <div class="footer-divider"></div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} <strong>KoperaSiswa</strong>. SMK Negeri 6 Balikpapan. All rights reserved.</p>
                </div>
                <div class="developer-credit">
                    <p>Developed with <i class="fas fa-heart" style="color: #f43f5e;"></i> by <a href="#" target="_blank">Tim A&R SMKN 6 Balikpapan</a></p>
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

    <!-- Script untuk Filter, Sorting, dan Back to Top -->
    <script>
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

        // Filter dan Sorting Function
        function filterProducts() {
            const categoryFilter = document.getElementById('categoryFilter').value;
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const sortFilter = document.getElementById('sortFilter').value;
            
            const products = document.querySelectorAll('.product-card');
            const productsGrid = document.getElementById('productsGrid');
            const noResults = document.getElementById('noResults');
            
            let visibleCount = 0;
            
            // Filter produk berdasarkan kategori dan pencarian
            products.forEach(product => {
                const category = product.dataset.category;
                const productName = product.dataset.name;
                const sellerName = product.dataset.seller;
                
                const matchesCategory = categoryFilter === 'all' || category === categoryFilter;
                const matchesSearch = productName.includes(searchInput) || sellerName.includes(searchInput);
                
                if (matchesCategory && matchesSearch) {
                    product.classList.remove('hidden');
                    visibleCount++;
                } else {
                    product.classList.add('hidden');
                }
            });
            
            // Sorting
            if (sortFilter !== 'terbaru') {
                const sortedProducts = Array.from(products).filter(p => !p.classList.contains('hidden'));
                
                sortedProducts.sort((a, b) => {
                    const priceA = parseInt(a.dataset.price);
                    const priceB = parseInt(b.dataset.price);
                    
                    if (sortFilter === 'termurah') {
                        return priceA - priceB;
                    } else if (sortFilter === 'termahal') {
                        return priceB - priceA;
                    }
                });
                
                // Reorder DOM
                sortedProducts.forEach(product => {
                    productsGrid.appendChild(product);
                });
            }
            
            // Update visible count
            document.getElementById('visibleCount').textContent = visibleCount;
            
            // Show/hide no results message
            if (visibleCount === 0 && products.length > 0) {
                noResults.classList.add('show');
            } else {
                noResults.classList.remove('show');
            }
        }
        
        // Reset filters
        function resetFilters() {
            document.getElementById('categoryFilter').value = 'all';
            document.getElementById('searchInput').value = '';
            document.getElementById('sortFilter').value = 'terbaru';
            filterProducts();
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set total count
            const totalProducts = document.querySelectorAll('.product-card').length;
            document.getElementById('totalCount').textContent = totalProducts;
            document.getElementById('visibleCount').textContent = totalProducts;
            
            // Animate stats
            animateNumber(document.getElementById('productCount'), 0, totalProducts, 2000);
            
            // Hitung unique sellers
            const sellers = new Set();
            document.querySelectorAll('.product-card').forEach(p => {
                sellers.add(p.dataset.seller);
            });
            animateNumber(document.getElementById('sellerCount'), 0, sellers.size, 2000);
        });
        
        // Animasi angka
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
    </script>

</body>
</html>