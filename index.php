<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';

// Get featured products
$featured_products = getFeaturedProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulse Wear - Elegant Bracelets for Every Occasion</title>
    <meta name="description" content="Discover our collection of elegant, handcrafted bracelets. Premium quality, timeless designs, perfect for any occasion.">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <a href="index.php">
                        <span class="logo-text">Pulse</span>
                        <span class="logo-accent">Wear</span>
                    </a>
                </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.php" class="nav-link">Collection</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                </ul>
                <div class="nav-actions">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="title-line">Elegant</span>
                    <span class="title-line">Bracelets</span>
                    <span class="title-line">for Every</span>
                    <span class="title-line">Moment</span>
                </h1>
                <p class="hero-subtitle">Discover our handcrafted collection of premium bracelets that tell your unique story with timeless elegance.</p>
                <div class="hero-buttons">
                    <a href="products.php" class="btn btn-primary">Shop Collection</a>
                    <a href="about.php" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-bracelet">
                    <img src="assets/images/main3.jpg" alt="Elegant Pulse Wear Bracelet Collection">
                </div>
            </div>
        </div>
        <div class="hero-scroll">
            <div class="scroll-indicator">
                <span>Scroll to explore</span>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Featured Collection</h2>
                <p class="section-subtitle">Our most popular designs, crafted with precision and style</p>
            </div>
            <div class="products-grid">
                <?php foreach ($featured_products as $product): ?>
                <div class="product-card" data-aos="fade-up">
                    <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="product-overlay">
                            <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-view">View Details</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($product['short_description']); ?></p>
                        <div class="product-price">
                            <span class="price">Rs. <?php echo number_format($product['price'], 2); ?></span>
                        </div>
                        <a href="contact.php" class="btn btn-primary">
                            <i class="fas fa-phone"></i> Contact for Order
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="section-footer">
                <a href="products.php" class="btn btn-outline">View All Products</a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <span class="logo-text">Pulse</span>
                        <span class="logo-accent">Wear</span>
                    </div>
                    <p>Elegant bracelets for every occasion. Handcrafted with love and precision.</p>
                    <div class="social-links">
                        <a href="https://youtube.com/@pulse_wear?si=SmwRQ23bq9FDo0i1" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="products.php">Shop</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="contact.php#faq-section">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p><i class="fas fa-envelope"></i> naturelover8100@gmail.com</p>
                    <p><i class="fas fa-phone"></i> +92 331 3269812</p>
                    <p><i class="fas fa-map-marker-alt"></i> Karachi, Pakistan</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Pulse Wear. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html> 