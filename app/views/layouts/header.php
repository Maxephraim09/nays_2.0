<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAYS 2.0 - National Association of Yung Students</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Animations */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-in {
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Hover animations */
        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* ===== TOP BAR ===== */
        .top-bar {
            background: #1B4D3E;
            color: white;
            padding: 8px 0;
            font-size: 0.9rem;
            position: relative;
            z-index: 1001;
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
            transform: translateY(-2px);
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
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #E9B741;
            color: #1B4D3E;
            border: 2px solid #E9B741;
        }

        .btn-primary:hover {
            background: #d4a130;
            border-color: #d4a130;
            transform: translateY(-2px);
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #1B4D3E;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            background: linear-gradient(135deg, #f0f7f0 0%, #e0efe0 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(233,183,65,0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero .container {
            display: flex;
            align-items: center;
            gap: 50px;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            flex: 1;
        }

        .hero-content h1 {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #1B4D3E;
        }

        .hero-content p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
        }

        .hero-image {
            flex: 1;
            text-align: center;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .hero-image i {
            font-size: 15rem;
            color: #1B4D3E;
            opacity: 0.8;
        }

        /* ===== SECTION HEADERS ===== */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .section-header p {
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        /* ===== FEATURES SECTION ===== */
        .features {
            padding: 80px 0;
            background: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .feature-card {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border: 1px solid rgba(27,77,62,0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(27,77,62,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f0f7f0 0%, #e0efe0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: transform 0.3s;
        }

        .feature-card:hover .feature-icon {
            transform: rotateY(180deg);
        }

        .feature-icon i {
            font-size: 2rem;
            color: #E9B741;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: #1B4D3E;
        }

        .feature-card p {
            color: #666;
            font-size: 0.95rem;
        }

        /* ===== TALENT SECTION ===== */
        .talent {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8faf8 0%, #f0f7f0 100%);
        }

        .talent-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .talent-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .talent-image {
            height: 250px;
            background: linear-gradient(135deg, #1B4D3E 0%, #2A6B55 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .talent-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(233,183,65,0.3) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        .talent-image i {
            font-size: 5rem;
            color: white;
            position: relative;
            z-index: 1;
        }

        .talent-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #E9B741;
            color: #1B4D3E;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 2;
        }

        .talent-content {
            padding: 25px;
        }

        .talent-content h3 {
            color: #1B4D3E;
            margin-bottom: 5px;
        }

        .talent-category {
            color: #E9B741;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .talent-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .talent-stat {
            text-align: center;
        }

        .talent-stat i {
            color: #E9B741;
        }

        /* ===== PROJECTS SECTION ===== */
        .projects {
            padding: 80px 0;
            background: white;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .project-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border: 1px solid rgba(27,77,62,0.1);
        }

        .project-image {
            height: 180px;
            background: linear-gradient(135deg, #e0efe0 0%, #c0dfc0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-image i {
            font-size: 3rem;
            color: #1B4D3E;
        }

        .project-content {
            padding: 20px;
        }

        .project-content h3 {
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .project-progress {
            margin: 15px 0;
        }

        .progress-bar {
            height: 8px;
            background: #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .progress-fill {
            height: 100%;
            background: #E9B741;
            border-radius: 20px;
            transition: width 1s ease;
        }

        .project-stats {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #666;
        }

        .project-amount {
            color: #059669;
            font-weight: 600;
        }

        .project-needed {
            color: #dc2626;
        }

        .project-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .project-days {
            color: #666;
            font-size: 0.9rem;
        }

        .project-days i {
            color: #E9B741;
        }

        .btn-small {
            padding: 8px 16px;
            background: #E9B741;
            color: #1B4D3E;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-small:hover {
            background: #d4a130;
            transform: translateY(-2px);
        }

        /* ===== GALLERY SECTION ===== */
        .gallery {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8faf8 0%, #f0f7f0 100%);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1B4D3E 0%, #2A6B55 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.6s;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        .gallery-image i {
            font-size: 3rem;
            color: white;
            opacity: 0.8;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(27,77,62,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay i {
            color: white;
            font-size: 2rem;
        }

        /* ===== ACADEMIC STAR SECTION ===== */
        .academic-star {
            padding: 80px 0;
            background: white;
        }

        .star-card {
            background: linear-gradient(135deg, #1B4D3E 0%, #2A6B55 100%);
            border-radius: 20px;
            padding: 50px;
            color: white;
            display: flex;
            align-items: center;
            gap: 50px;
            box-shadow: 0 20px 40px rgba(27,77,62,0.3);
        }

        .star-image {
            width: 200px;
            height: 200px;
            background: #E9B741;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #1B4D3E;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .star-content h3 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .star-stats {
            display: flex;
            gap: 30px;
            margin: 20px 0;
        }

        .star-stat {
            text-align: center;
        }

        .star-stat .number {
            font-size: 2rem;
            font-weight: 700;
            color: #E9B741;
        }

        .star-badge {
            display: inline-block;
            background: #E9B741;
            color: #1B4D3E;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            margin-top: 15px;
        }

        /* ===== HOT NEWS SECTION ===== */
        .hot-news {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8faf8 0%, #f0f7f0 100%);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            position: relative;
        }

        .news-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #dc2626;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 2;
            animation: pulse 2s infinite;
        }

        .news-image {
            height: 200px;
            background: linear-gradient(135deg, #e0efe0 0%, #c0dfc0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .news-image i {
            font-size: 3rem;
            color: #1B4D3E;
        }

        .news-content {
            padding: 20px;
        }

        .news-date {
            color: #E9B741;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .news-content h3 {
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .news-link {
            color: #E9B741;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
        }

        .news-link:hover {
            transform: translateX(5px);
        }

        /* ===== ASSETS SECTION ===== */
        .assets {
            padding: 80px 0;
            background: white;
        }

        .assets-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .asset-card {
            background: linear-gradient(135deg, #f8faf8 0%, #f0f7f0 100%);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .asset-card:hover {
            border-color: #E9B741;
            transform: translateY(-5px);
        }

        .asset-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: #1B4D3E;
            transition: transform 0.3s;
        }

        .asset-card:hover .asset-icon {
            transform: scale(1.1) rotate(360deg);
        }

        .asset-card h3 {
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .asset-count {
            color: #666;
            margin-bottom: 20px;
        }

        .asset-btn {
            display: inline-block;
            padding: 10px 25px;
            background: #1B4D3E;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .asset-btn:hover {
            background: #E9B741;
            color: #1B4D3E;
            transform: translateY(-2px);
        }

        /* ===== ACHIEVEMENTS SECTION ===== */
        .achievements {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8faf8 0%, #f0f7f0 100%);
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .achievement-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .achievement-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(233,183,65,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        .achievement-icon {
            width: 80px;
            height: 80px;
            background: #E9B741;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: #1B4D3E;
            position: relative;
            z-index: 1;
        }

        .achievement-card h3 {
            color: #1B4D3E;
            margin-bottom: 10px;
        }

        .achievement-date {
            color: #E9B741;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .achievement-card p {
            color: #666;
        }

        /* ===== CTA SECTION ===== */
        .cta {
            background: linear-gradient(135deg, #1B4D3E 0%, #0F3A2E 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(233,183,65,0.2) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }

        .cta .container {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .cta .btn-outline {
            border-color: white;
            color: white;
        }

        .cta .btn-outline:hover {
            background: white;
            color: #1B4D3E;
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
            transform: translateY(-3px);
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
            padding-left: 5px;
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
            transition: transform 0.3s;
        }

        .newsletter-form input:focus {
            transform: scale(1.02);
            outline: none;
        }

        .newsletter-form button {
            padding: 12px 20px;
            background: #E9B741;
            color: #1B4D3E;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .newsletter-form button:hover {
            background: #d4a130;
            transform: translateY(-2px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #333;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .features-grid,
            .talent-grid,
            .projects-grid,
            .gallery-grid,
            .assets-grid,
            .achievements-grid,
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .star-card {
                flex-direction: column;
                text-align: center;
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
            
            .hero .container {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .features-grid,
            .talent-grid,
            .projects-grid,
            .gallery-grid,
            .assets-grid,
            .achievements-grid,
            .news-grid,
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>