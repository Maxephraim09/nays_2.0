<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8faf8;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== TOP BAR ===== */
        .top-bar {
            background: #1B4D3E;
            color: white;
            padding: 8px 0;
            font-size: 0.9rem;
        }

        .top-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-left span {
            margin-right: 20px;
        }

        .top-bar-left i {
            margin-right: 5px;
            color: #E9B741;
        }

        .top-bar-right a {
            color: white;
            margin-left: 15px;
            transition: color 0.3s;
        }

        .top-bar-right a:hover {
            color: #E9B741;
        }

        /* ===== HEADER / NAVBAR ===== */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1B4D3E;
        }

        .logo span {
            font-size: 0.8rem;
            color: #E9B741;
            display: block;
            margin-top: -5px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #E9B741;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 24px;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-outline {
            border: 2px solid #1B4D3E;
            color: #1B4D3E;
        }

        .btn-outline:hover {
            background: #1B4D3E;
            color: white;
        }

        .btn-primary {
            background: #E9B741;
            color: #1B4D3E;
            border: 2px solid #E9B741;
        }

        .btn-primary:hover {
            background: #d4a130;
            border-color: #d4a130;
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #1B4D3E;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #1B4D3E 0%, #2A6B55 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .page-header i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #E9B741;
        }

        /* ===== SEARCH SECTION ===== */
        .search-section {
            padding: 40px 0;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .search-container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            gap: 15px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-box input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .search-box input:focus {
            border-color: #E9B741;
            outline: none;
            box-shadow: 0 0 0 3px rgba(233,183,65,0.2);
        }

        .search-btn {
            padding: 15px 40px;
            background: #E9B741;
            color: #1B4D3E;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .search-btn:hover {
            background: #d4a130;
            transform: translateY(-2px);
        }

        /* ===== CATEGORY TABS ===== */
        .category-tabs {
            padding: 30px 0;
            background: white;
        }

        .tabs-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .tab {
            padding: 12px 30px;
            background: #f1f5f9;
            border-radius: 30px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .tab i {
            font-size: 1.1rem;
        }

        .tab:hover {
            background: #e2e8f0;
        }

        .tab.active {
            background: #1B4D3E;
            color: white;
        }

        .tab.active i {
            color: #E9B741;
        }

        /* ===== ASSETS GRID ===== */
        .assets-section {
            padding: 40px 0 80px;
            background: #f8faf8;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section-header h2 {
            color: #1B4D3E;
            font-size: 1.8rem;
        }

        .section-header .count {
            background: #e2e8f0;
            padding: 5px 15px;
            border-radius: 20px;
            color: #475569;
            font-weight: 500;
        }

        .assets-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .asset-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border: 1px solid rgba(27,77,62,0.1);
        }

        .asset-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(27,77,62,0.15);
        }

        .asset-preview {
            height: 180px;
            background: linear-gradient(135deg, #f0f7f0 0%, #e0efe0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .asset-preview i {
            font-size: 3.5rem;
            color: #1B4D3E;
            transition: transform 0.3s;
        }

        .asset-card:hover .asset-preview i {
            transform: scale(1.1);
        }

        .asset-type {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #E9B741;
            color: #1B4D3E;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .asset-content {
            padding: 20px;
        }

        .asset-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1B4D3E;
            margin-bottom: 8px;
        }

        .asset-meta {
            display: flex;
            gap: 15px;
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 15px;
        }

        .asset-meta i {
            color: #E9B741;
            margin-right: 3px;
        }

        .asset-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .asset-size {
            color: #64748b;
            font-size: 0.85rem;
        }

        .download-btn {
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1B4D3E;
            text-decoration: none;
            transition: all 0.3s;
        }

        .download-btn:hover {
            background: #E9B741;
            color: #1B4D3E;
            transform: scale(1.1);
        }

        /* ===== PAGINATION ===== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .page-item {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: white;
            color: #475569;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: 1px solid #e2e8f0;
        }

        .page-item:hover,
        .page-item.active {
            background: #1B4D3E;
            color: white;
            border-color: #1B4D3E;
        }

        .page-item.next {
            width: auto;
            padding: 0 20px;
        }

        /* ===== FEATURED ASSETS SECTION ===== */
        .featured-section {
            padding: 60px 0;
            background: white;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .featured-card {
            display: flex;
            background: linear-gradient(135deg, #f8faf8 0%, #f0f7f0 100%);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid rgba(27,77,62,0.1);
        }

        .featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(27,77,62,0.15);
        }

        .featured-preview {
            width: 180px;
            background: linear-gradient(135deg, #1B4D3E 0%, #2A6B55 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .featured-preview i {
            font-size: 3rem;
            color: white;
        }

        .featured-content {
            flex: 1;
            padding: 25px;
        }

        .featured-content h3 {
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .featured-meta {
            display: flex;
            gap: 20px;
            margin: 15px 0;
            color: #64748b;
            font-size: 0.9rem;
        }

        .featured-btn {
            display: inline-block;
            padding: 10px 25px;
            background: #E9B741;
            color: #1B4D3E;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .featured-btn:hover {
            background: #d4a130;
            transform: translateX(5px);
        }

        /* ===== CATEGORIES SECTION ===== */
        .categories-section {
            padding: 60px 0;
            background: #f8faf8;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .category-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
            cursor: pointer;
        }

        .category-card:hover {
            border-color: #E9B741;
            transform: translateY(-5px);
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f0f7f0 0%, #e0efe0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: #1B4D3E;
        }

        .category-card h3 {
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .category-count {
            color: #E9B741;
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* ===== UPLOAD CTA ===== */
        .upload-cta {
            background: linear-gradient(135deg, #1B4D3E 0%, #0F3A2E 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .upload-cta h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .upload-cta p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .upload-btn {
            display: inline-block;
            padding: 15px 50px;
            background: #E9B741;
            color: #1B4D3E;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
        }

        .upload-btn:hover {
            background: #d4a130;
            transform: scale(1.05);
        }

        .upload-btn i {
            margin-right: 10px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: #1a1a1a;
            color: #999;
            padding: 60px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-about h3 {
            color: white;
            margin-bottom: 20px;
        }

        .footer-about p {
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
        }

        .footer-social a:hover {
            background: #E9B741;
            color: #1B4D3E;
        }

        .footer-links h4 {
            color: white;
            margin-bottom: 20px;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #999;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #E9B741;
        }

        .footer-newsletter h4 {
            color: white;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
        }

        .newsletter-form button {
            padding: 12px 20px;
            background: #E9B741;
            color: #1B4D3E;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .newsletter-form button:hover {
            background: #d4a130;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #333;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .assets-grid,
            .categories-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .featured-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }
            
            .nav-menu {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                gap: 15px;
            }
            
            .nav-menu.active {
                display: flex;
            }
            
            .nav-buttons {
                display: none;
            }
            
            .search-container {
                flex-direction: column;
            }
            
            .assets-grid,
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .featured-card {
                flex-direction: column;
            }
            
            .featured-preview {
                width: 100%;
                height: 150px;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .assets-grid,
            .categories-grid {
                grid-template-columns: 1fr;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- PAGE HEADER -->
    <section class="page-header">
        <div class="container">
            <i class="fas fa-folder-open"></i>
            <h1>Assets Library</h1>
            <p>Download free resources for your projects - music, videos, images, documents and more</p>
        </div>
    </section>

    <!-- SEARCH SECTION -->
    <section class="search-section">
        <div class="container">
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search assets by name, category, or tags...">
                </div>
                <button class="search-btn"><i class="fas fa-filter"></i> Search</button>
            </div>
        </div>
    </section>

    <!-- CATEGORY TABS -->
    <section class="category-tabs">
        <div class="container">
            <div class="tabs-container">
                <div class="tab active">
                    <i class="fas fa-layer-group"></i> All Assets
                </div>
                <div class="tab">
                    <i class="fas fa-music"></i> Music
                </div>
                <div class="tab">
                    <i class="fas fa-video"></i> Videos
                </div>
                <div class="tab">
                    <i class="fas fa-image"></i> Images
                </div>
                <div class="tab">
                    <i class="fas fa-file-pdf"></i> Documents
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED ASSETS SECTION -->
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2>Featured Assets</h2>
                <span class="count">Popular this week</span>
            </div>
            <div class="featured-grid">
                <div class="featured-card">
                    <div class="featured-preview">
                        <i class="fas fa-music"></i>
                    </div>
                    <div class="featured-content">
                        <h3>Yungur Cultural Anthem</h3>
                        <p>A collection of traditional Yungur songs and rhythms.</p>
                        <div class="featured-meta">
                            <span><i class="fas fa-download"></i> 2.3K downloads</span>
                            <span><i class="fas fa-star"></i> 4.9 rating</span>
                        </div>
                        <a href="#" class="featured-btn">Download Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="featured-card">
                    <div class="featured-preview">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="featured-content">
                        <h3>NAYS Conference 2025</h3>
                        <p>Full recording of the annual conference highlights.</p>
                        <div class="featured-meta">
                            <span><i class="fas fa-download"></i> 1.8K downloads</span>
                            <span><i class="fas fa-star"></i> 4.8 rating</span>
                        </div>
                        <a href="#" class="featured-btn">Download Now <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ASSETS GRID SECTION -->
    <section class="assets-section">
        <div class="container">
            <div class="section-header">
                <h2>📁 All Assets</h2>
                <span class="count">1,718 items</span>
            </div>
            
            <div class="assets-grid">
                <!-- Music Assets -->
                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-music"></i>
                        <span class="asset-type">MP3</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">Traditional Wedding Song</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Maria Y.</span>
                            <span><i class="fas fa-clock"></i> 3:45</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">5.2 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-music"></i>
                        <span class="asset-type">MP3</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">NAYS Theme Song</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Samuel B.</span>
                            <span><i class="fas fa-clock"></i> 2:30</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">3.8 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Video Assets -->
                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-video"></i>
                        <span class="asset-type">MP4</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">Leadership Workshop 2026</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Dr. Musa</span>
                            <span><i class="fas fa-clock"></i> 45:20</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">450 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-video"></i>
                        <span class="asset-type">MP4</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">Cultural Day Celebration</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> NAYS Media</span>
                            <span><i class="fas fa-clock"></i> 12:15</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">180 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Image Assets -->
                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-image"></i>
                        <span class="asset-type">JPG</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">Group Photo 2025</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Photography</span>
                            <span><i class="fas fa-expand"></i> 4K</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">8.2 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-image"></i>
                        <span class="asset-type">PNG</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">NAYS Logo Pack</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Design Team</span>
                            <span><i class="fas fa-expand"></i> Vector</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">2.1 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Document Assets -->
                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-file-pdf"></i>
                        <span class="asset-type">PDF</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">Constitution 2026</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Legal</span>
                            <span><i class="fas fa-file"></i> 24 pages</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">1.5 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="asset-card">
                    <div class="asset-preview">
                        <i class="fas fa-file-word"></i>
                        <span class="asset-type">DOC</span>
                    </div>
                    <div class="asset-content">
                        <h3 class="asset-title">Annual Report 2025</h3>
                        <div class="asset-meta">
                            <span><i class="fas fa-user"></i> Secretary</span>
                            <span><i class="fas fa-file"></i> 56 pages</span>
                        </div>
                        <div class="asset-footer">
                            <span class="asset-size">3.2 MB</span>
                            <a href="#" class="download-btn"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <div class="page-item active">1</div>
                <div class="page-item">2</div>
                <div class="page-item">3</div>
                <div class="page-item">4</div>
                <div class="page-item">5</div>
                <div class="page-item next">Next <i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <h2>📊 Browse by Category</h2>
                <span class="count">All assets</span>
            </div>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-music"></i>
                    </div>
                    <h3>Music</h3>
                    <div class="category-count">247 tracks</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3>Videos</h3>
                    <div class="category-count">156 videos</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <h3>Images</h3>
                    <div class="category-count">892 photos</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h3>Documents</h3>
                    <div class="category-count">423 files</div>
                </div>
            </div>
        </div>
    </section>

    <!-- UPLOAD CTA -->
    <section class="upload-cta">
        <div class="container">
            <h2>Have Resources to Share?</h2>
            <p>Upload your own assets and contribute to the NAYS community library</p>
            <a href="#" class="upload-btn"><i class="fas fa-cloud-upload-alt"></i> Upload Assets</a>
        </div>
    </section>
