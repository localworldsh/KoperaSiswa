<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KoperaSiswa - Kantin Digital Siswa Modern</title>
    
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

        /* Smooth Scroll & Base Styles */
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

        /* --- SEKSI CARA KERJA (NEW) --- */
        .how-it-works { padding: 5rem 0; background: #fff; }
        .how-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 
            gap: 2rem; 
            margin-top: 3rem; 
        }
        .how-card { 
            text-align: center; 
            padding: 2.5rem 1.5rem; 
            background: var(--bg-light); 
            border-radius: 24px; 
            border: 1px solid #f1f5f9;
            transition: 0.3s;
            position: relative;
        }
        .how-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-md); border-color: var(--primary); }
        .how-card i { 
            font-size: 2.5rem; 
            background: var(--grad); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            margin-bottom: 1.5rem;
            display: block;
        }
        .step-circle {
            width: 30px; height: 30px; background: var(--grad); color: white;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-weight: 800; margin: 0 auto 1rem; font-size: 0.8rem;
        }

        /* --- PRODUCT CARDS --- */
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

        /* --- REGISTRATION FORM --- */
        .registration-section { padding: 7rem 0; background: #f8fafc; border-radius: 60px 60px 0 0; }
        .form-card { 
            background: white; padding: 3.5rem; border-radius: 35px; 
            max-width: 850px; margin: 0 auto; box-shadow: var(--shadow-md);
        }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .full-width { grid-column: 1 / -1; }
        
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: var(--text-gray); }
        input, select, textarea { 
            width: 100%; padding: 14px 18px; border-radius: 12px; 
            border: 2px solid #f1f5f9; background: #f8fafc; transition: 0.3s; font-family: inherit;
        }
        input:focus, select:focus, textarea:focus { 
            outline: none; border-color: var(--primary); background: white; 
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1); 
        }

        /* --- FOOTER --- */
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
            .hero-title { font-size: 2.8rem; }
            .form-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; gap: 1rem; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo-text"><h1>Kopera<span>Siswa.</span></h1></div>
        <div class="nav-links">
            <a href="#"><i class="fas fa-home"></i> Home</a>
            <a href="#produk"><i class="fas fa-shopping-bag"></i> Produk</a>
            <a href="#cara-kerja"><i class="fas fa-play-circle"></i> Cara Kerja</a>
            <a href="#pendaftaran" class="btn-primary" style="padding: 10px 20px; font-size: 0.85rem;"><i class="fas fa-user-plus"></i> Daftar Jualan</a>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Wirausaha <span style="color:var(--primary)">Muda</span> <br>Mulai dari Sini!</h1>
            <p style="color: var(--text-gray); max-width: 600px; margin: 0 auto 2.5rem; font-size: 1.1rem;">Kantin digital khusus siswa SMK 6 Balikpapan. Jual, beli, dan kembangkan bisnis kreatifmu.</p>
            <a href="#pendaftaran" class="btn-primary">Mulai Jualan Sekarang</a>
        </div>
    </section>

    <section id="cara-kerja" class="how-it-works">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.2rem; font-weight: 800;">Gimana Cara Jualannya?</h2>
                <p style="color: var(--text-gray);">Hanya 4 langkah mudah untuk mulai berjualan</p>
            </div>
            <div class="how-grid">
                <div class="how-card">
                    <div class="step-circle">1</div>
                    <i class="fas fa-camera"></i>
                    <h4 style="margin-bottom: 10px;">Foto Produk</h4>
                    <p style="font-size: 0.85rem; color: var(--text-gray);">Ambil foto produk dengan background bersih dan lighting bagus.</p>
                </div>
                <div class="how-card">
                    <div class="step-circle">2</div>
                    <i class="fas fa-upload"></i>
                    <h4 style="margin-bottom: 10px;">Upload ke Platform</h4>
                    <p style="font-size: 0.85rem; color: var(--text-gray);">Isi form dan upload produkmu ke StudentMarket.</p>
                </div>
                <div class="how-card">
                    <div class="step-circle">3</div>
                    <i class="fas fa-share-nodes"></i>
                    <h4 style="margin-bottom: 10px;">Share & Promosi</h4>
                    <p style="font-size: 0.85rem; color: var(--text-gray);">Bagikan link produk ke Instagram, WhatsApp, atau TikTok.</p>
                </div>
                <div class="how-card">
                    <div class="step-circle">4</div>
                    <i class="fas fa-hand-holding-dollar"></i>
                    <h4 style="margin-bottom: 10px;">Terima Pesanan</h4>
                    <p style="font-size: 0.85rem; color: var(--text-gray);">Pembeli hubungi langsung via WhatsApp untuk order.</p>
                </div>
            </div>
        </div>
    </section>

    <main class="container" id="produk">
        <section style="padding: 3rem 0;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.2rem; font-weight: 800;">Katalog Produk Siswa</h2>
                <div style="width: 50px; height: 4px; background: var(--grad); margin: 15px auto; border-radius: 10px;"></div>
            </div>
            
            <div class="products-grid">
                @forelse($products as $p)
                <article class="product-card">
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
        </section>

        <section id="pendaftaran" class="registration-section">
            <div class="form-card">
                <div style="margin-bottom: 2.5rem;">
                    <h2 style="font-size: 2rem; font-weight: 800;">Daftarkan Jualanmu</h2>
                    <p style="color: var(--text-gray);">Kembangkan bisnismu sekarang juga.</p>
                </div>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group"><label>Nama Lengkap</label><input type="text" name="fullName" placeholder="Contoh: Budi Santoso" required></div>
                        <div class="form-group"><label>Kelas</label><input type="text" name="class" placeholder="Contoh: XII RPL 1" required></div>
                        <div class="form-group"><label>WhatsApp (Awali 62)</label><input type="number" name="phone" placeholder="628123456789" required></div>
                        <div class="form-group"><label>Nama Produk</label><input type="text" name="productName" placeholder="Nama makanan/jasa" required></div>
                        <div class="form-group"><label>Harga (Rp)</label><input type="number" name="price" placeholder="Hanya angka" required></div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category">
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Aksesoris">Aksesoris</option>
                                <option value="Jasa">Jasa / Digital</option>
                            </select>
                        </div>
                        <div class="form-group full-width"><label>Foto Produk</label><input type="file" name="image" required></div>
                        <div class="form-group full-width"><label>Deskripsi Singkat</label><textarea name="description" rows="3" placeholder="Jelaskan keunggulan produkmu..."></textarea></div>
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; margin-top: 2rem; padding: 18px;">Posting Jualan Sekarang!</button>
                </form>
            </div>
        </section>
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
                        <li><a href="#">Home</a></li>
                        <li><a href="#produk">Produk</a></li>
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

</body>
</html>