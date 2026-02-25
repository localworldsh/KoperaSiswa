<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        .product-info { padding: 1.8rem; }
        .price-tag { color: var(--primary); font-weight: 800; font-size: 1.4rem; margin-bottom: 1.5rem; display: block; }
        
        .action-group { display: flex; gap: 10px; margin-top: 15px; }
        .btn-edit { 
            flex: 1; background: #6366f1; color: white; text-align: center; 
            padding: 12px; border-radius: 12px; text-decoration: none; font-size: 0.85rem; font-weight: 700; 
            transition: 0.3s;
        }
        .btn-delete { 
            flex: 1; background: #fee2e2; color: #f43f5e; border: none; 
            padding: 12px; border-radius: 12px; cursor: pointer; font-size: 0.85rem; font-weight: 700; 
            transition: 0.3s;
        }
        .btn-edit:hover { background: var(--primary-hover); }
        .btn-delete:hover { background: #fecaca; }

        /* --- FOOTER --- */
        .footer-main { background: #0b0f1a; color: #94a3b8; padding: 4rem 0 2rem; border-top: 1px solid rgba(255,255,255,0.05); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.05); padding-top: 2rem; text-align: center; font-size: 0.85rem; }

        @media (max-width: 768px) {
            .hero-title { font-size: 2.8rem; }
            .nav-links .admin-text { display: none; }
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
            
            <div class="products-grid">
                @forelse($products as $p)
                <article class="product-card">
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
                                <i class="far fa-edit"></i> Edit Produk
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
            </div>
        </section>
    </main>

    <footer class="footer-main">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2026 Panel Admin KoperaSiswa. Management System for SMK 6 Balikpapan.</p>
            </div>
        </div>
    </footer>

</body>
</html>