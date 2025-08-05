<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$product_id) {
    header('Location: products.php');
    exit;
}

// Get product details
$product = getProduct($product_id);

if (!$product) {
    header('Location: products.php');
    exit;
}


// Get related products
$related_products = getAllProducts($product['category'], 4);
$related_products = array_filter($related_products, function($p) use ($product_id) {
    return $p['id'] != $product_id;
});
$related_products = array_slice($related_products, 0, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Pulse Wear</title>
    <meta name="description" content="<?php echo htmlspecialchars($product['short_description']); ?>">
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
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="products.php" class="nav-link active">Collection</a>
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

    <!-- Product Detail -->
    <section class="product-detail">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a>
                <span>/</span>
                <a href="products.php">Collection</a>
                <span>/</span>
                <span><?php echo htmlspecialchars($product['name']); ?></span>
            </div>


            <div class="product-detail-content">
                <div class="product-gallery">
                    <div class="main-image">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" id="main-product-image">
                    </div>
                    <div class="image-thumbnails">
                        <div class="thumbnail active" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 1">
                        </div>
                        <?php if (isset($product['additional_images']) && !empty($product['additional_images'])): ?>
                            <?php foreach ($product['additional_images'] as $index => $additionalImage): ?>
                            <div class="thumbnail" data-image="<?php echo htmlspecialchars($additionalImage); ?>">
                                <img src="<?php echo htmlspecialchars($additionalImage); ?>" alt="Thumbnail <?php echo $index + 2; ?>">
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="thumbnail" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 2">
                            </div>
                            <div class="thumbnail" data-image="<?php echo htmlspecialchars($product['image']); ?>">
                                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Thumbnail 3">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="product-info-detail">
                    <div class="product-header">
                        <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
                        <div class="product-meta">
                            <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                            <?php if ($product['featured']): ?>
                            <span class="featured-badge">Featured</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="product-price-detail">
                         <span class="price-large">Rs. <?php echo number_format($product['price'], 2); ?></span>
                         

                    </div>

                    <div class="product-description-full">
                        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                    </div>

                    <div class="product-actions">
                        <div class="delivery-notice">
                            <i class="fas fa-info-circle"></i>
                            <strong>Delivery only available in Karachi</strong>
                        </div>
                        <a href="contact.php" class="btn btn-primary btn-large">
                            <i class="fas fa-phone"></i>
                            Contact for Order
                        </a>
                    </div>

                    <div class="product-details">
                        <div class="detail-item">
                            <span class="detail-label">Size:</span>
                            <span class="detail-value">Adjustable (7-8 inches)</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Weight:</span>
                            <span class="detail-value">15-25 grams</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Care:</span>
                            <span class="detail-value">Clean with soft cloth, avoid chemicals</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <?php if (!empty($related_products)): ?>
    <section class="related-products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">You Might Also Like</h2>
                <p class="section-subtitle">Discover more beautiful bracelets in this collection</p>
            </div>
            <div class="products-grid">
                <?php foreach ($related_products as $related): ?>
                <div class="product-card" data-aos="fade-up">
                    <div class="product-image">
                        <img src="<?php echo htmlspecialchars($related['image']); ?>" alt="<?php echo htmlspecialchars($related['name']); ?>">
                        <div class="product-overlay">
                            <a href="product.php?id=<?php echo $related['id']; ?>" class="btn btn-view">View Details</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo htmlspecialchars($related['name']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($related['short_description']); ?></p>
                        <div class="product-price">
                            <span class="price">Rs. <?php echo number_format($related['price'], 2); ?></span>
                        </div>
                        <a href="contact.php" class="btn btn-primary">
                            <i class="fas fa-phone"></i> Contact for Order
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

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
    <script>
        // Product gallery functionality
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('main-product-image');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    // Remove active class from all thumbnails
                    thumbnails.forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked thumbnail
                    this.classList.add('active');
                    
                    // Update main image
                    const imageSrc = this.getAttribute('data-image');
                    mainImage.src = imageSrc;
                });
            });
        });

    </script>
</body>
</html> 