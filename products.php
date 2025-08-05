<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';

// Get search and filter parameters
$search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
$category = isset($_GET['category']) ? sanitizeInput($_GET['category']) : '';
$sort = isset($_GET['sort']) ? sanitizeInput($_GET['sort']) : 'newest';

// Get products based on search and filters
if ($search) {
    $products = searchProducts(null, $search, $category);
} else {
    $products = getAllProducts($category);
}

// Sort products
if ($sort === 'price_low') {
    usort($products, function($a, $b) { return $a['price'] <=> $b['price']; });
} elseif ($sort === 'price_high') {
    usort($products, function($a, $b) { return $b['price'] <=> $a['price']; });
} elseif ($sort === 'name') {
    usort($products, function($a, $b) { return strcmp($a['name'], $b['name']); });
}

// Get categories for filter
$categories = getCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection - Pulse Wear</title>
    <meta name="description" content="Explore our complete collection of elegant bracelets. Find the perfect piece for any occasion.">
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title">Our Collection</h1>
                <p class="page-subtitle">Discover our handcrafted bracelets, each piece tells a unique story</p>
            </div>
        </div>
    </section>

    <!-- Filters and Search -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-container">
                <div class="search-box">
                    <form method="GET" action="products.php" class="search-form">
                        <input type="text" name="search" placeholder="Search bracelets..." value="<?php echo htmlspecialchars($search); ?>" class="search-input">
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <div class="filters">
                    <div class="filter-group">
                        <label for="category-filter">Category:</label>
                        <select name="category" id="category-filter" class="filter-select" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['category']); ?>" <?php echo $category === $cat['category'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['category']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="sort-filter">Sort by:</label>
                        <select name="sort" id="sort-filter" class="filter-select" onchange="this.form.submit()">
                            <option value="newest" <?php echo $sort === 'newest' ? 'selected' : ''; ?>>Newest First</option>
                            <option value="price_low" <?php echo $sort === 'price_low' ? 'selected' : ''; ?>>Price: Low to High</option>
                            <option value="price_high" <?php echo $sort === 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
                            <option value="name" <?php echo $sort === 'name' ? 'selected' : ''; ?>>Name: A to Z</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <?php if ($search || $category): ?>
            <div class="active-filters">
                <span>Active filters:</span>
                <?php if ($search): ?>
                <span class="filter-tag">
                    Search: "<?php echo htmlspecialchars($search); ?>"
                    <a href="?<?php echo http_build_query(array_merge($_GET, ['search' => ''])); ?>" class="remove-filter">&times;</a>
                </span>
                <?php endif; ?>
                <?php if ($category): ?>
                <span class="filter-tag">
                    Category: <?php echo htmlspecialchars($category); ?>
                    <a href="?<?php echo http_build_query(array_merge($_GET, ['category' => ''])); ?>" class="remove-filter">&times;</a>
                </span>
                <?php endif; ?>
                <a href="products.php" class="clear-filters">Clear all filters</a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="products-section">
        <div class="container">
            <?php if (empty($products)): ?>
            <div class="no-products">
                <div class="no-products-content">
                    <i class="fas fa-search"></i>
                    <h2>No products found</h2>
                    <p>Try adjusting your search criteria or browse all our products.</p>
                    <a href="products.php" class="btn btn-primary">View All Products</a>
                </div>
            </div>
            <?php else: ?>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                <div class="product-card" data-aos="fade-up">
                    <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="product-overlay">
                            <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-view">View Details</a>
                        </div>
                        <?php if ($product['featured']): ?>
                        <div class="product-badge">
                            <span>Featured</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($product['short_description']); ?></p>
                        <div class="product-meta">
                            <span class="product-category"><?php echo htmlspecialchars($product['category']); ?></span>
                        </div>
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
            
            <div class="products-summary">
                <p>Showing <?php echo count($products); ?> product<?php echo count($products) !== 1 ? 's' : ''; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Categories Section -->
  <section class="categories-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Shop by Category</h2>
            <p class="section-subtitle">Find your perfect bracelet by category</p>
        </div>
        <div class="categories-grid">
            <a href="products.php?category=Pearl" class="category-card">
                <div class="category-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3>Pearl</h3>
                <span class="category-link">Shop Now <i class="fas fa-arrow-right"></i></span>
            </a>
            <a href="products.php?category=Charm" class="category-card">
                <div class="category-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Charm</h3>
                <span class="category-link">Shop Now <i class="fas fa-arrow-right"></i></span>
            </a>
            <a href="products.php?category=Collection" class="category-card">
                <div class="category-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3>Collection</h3>
                <span class="category-link">Shop Now <i class="fas fa-arrow-right"></i></span>
            </a>
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