<?php
// Helper functions for Pulse Wear website

// Get featured products
function getFeaturedProducts() {
    $products = getSampleProducts();
    return array_filter($products, function($product) {
        return $product['featured'] === true;
    });
}

// Get all products
function getAllProducts($category = null, $limit = null) {
    $products = getSampleProducts();
    
    // Filter by category if specified
    if ($category) {
        $products = array_filter($products, function($product) use ($category) {
            return $product['category'] === $category;
        });
    }
    
    // Apply limit if specified
    if ($limit) {
        $products = array_slice($products, 0, $limit);
    }
    
    return $products;
}

// Get single product
function getProduct($id) {
    return getSampleProduct($id);
}

// Get product categories
function getCategories() {
    return getSampleCategories();
}

// Sample data fallback functions
function getSampleProducts($limit = null) {
    $products = [
        [
            'id' => 1,
            'name' => 'Moonlight Charm Bracelet',
            'short_description' => 'Timeless chain bracelet with delicate links',
            'description' => 'Elegant bracelet with teal and pearl beads, heart detail, and a cute butterfly charm — perfect for a soft, stylish look.',
            'price' => 200,
            'image' => 'assets/images/1.jpg',
            'category' => 'Charm',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 2,
            'name' => 'Pink Pearl Charm',
            'short_description' => 'Beautiful Pearl infinity symbol bracelet',
            'description' => 'A cute pink bracelet with a charming bow detail, perfect for adding a touch of sweetness to your style.',
            'price' => 200,
            'image' => 'assets/images/2.2.jpg',
            'category' => 'Charm',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 3,
            'name' => 'Pink Pearl Bracelet',
            'short_description' => 'Elegant pearl bracelet',
            'description' => 'A cute pink bracelet with a charming bow detail, perfect for adding a touch of sweetness to your style.',
            'price' => 200,
            'image' => 'assets/images/3.jpg',
            'category' => 'Pearl',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 4,
            'name' => 'Butterfly Bracelet',
            'short_description' => 'Stylish Bracelet for Special one',
            'description' => 'Delicate pink bracelet featuring a graceful butterfly charm — perfect for a soft, feminine touch.',
            'price' => 200,
            'image' => 'assets/images/4.jpg',
            'category' => 'Pearl',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 5,
            'name' => 'Cherry Charm Bracelet',
            'short_description' => 'Stylish Bracelet for every Occasion',
            'description' => 'Add a pop of playful elegance to your style with this Cherry Charm Bracelet! Featuring adorable cherry charms with a glossy red finish and delicate green leaves, this bracelet is perfect for anyone who loves fun, fruity fashion. Lightweight, stylish, and adjustable—it is a sweet treat for your wrist.',
            'price' => 200,
            'image' => 'assets/images/5.1.jpg',
            'category' => 'Charm',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 6,
            'name' => 'Charmy Dream Butterfly 🦋 Bracelet',
            'short_description' => 'Personalizable charm bracelet with multiple charms',
            'description' => 'Grace your wrist with charm and elegance! This Pink Butterfly Bracelet features a delicate butterfly charm in soft pink tones—perfect for adding a touch of whimsy and femininity to any outfit.',
            'price' => 200,
            'image' => 'assets/images/6.1.jpg',
            'category' => 'Charm',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 7,
            'name' => 'Panda Vibes 🐼',
            'short_description' => 'Adorable Panda Theme Bracelet',
            'description' => 'Adorable panda-themed bracelet featuring black and white charms, perfect for animal lovers and cute style fans',
            'price' => 200,
            'image' => 'assets/images/7.1.jpg',
            'category' => 'Charm',
            'featured' => false,
            'in_stock' => true
        ],
        [
            'id' => 8,
            'name' => 'Bow Beauty',
            'short_description' => 'Make a day more memorizable with stylish bracelet',
            'description' => 'Celebrate in style with this green and white bracelet, featuring a sparkling bow charm — a perfect match for Pakistan IndependenceDay spirit!',
            'price' => 250,
            'image' => 'assets/images/8.1.jpg',
            'category' => 'Pearl',
            'featured' => false,
            'in_stock' => true
        ],
        [
            'id' => 9,
            'name' => 'Ghost Charm Best friends bracelet',
            'short_description' => 'A perfect gift for you & your friend',
            'description' => 'A sweet and stylish bracelet to celebrate your unbreakable bond with your best friend — matching charms, shared memories, and endless friendship! 👻',
            'price' => 500,
            'image' => 'assets/images/9.jpg',
            'category' => 'Charm',
            'featured' => false,
            'in_stock' => true
        ],
        [
            'id' => 10,
            'name' => 'Bow Keychain',
            'short_description' => 'Simple and elegant Keychain',
            'description' => 'This bow keychain with a nature theme adds a perfect style to your bagpack as a keychain . Perfect for nature lovers.',
            'price' => 200,
            'image' => 'assets/images/10.1.jpg',
            'category' => 'Charm',
            'featured' => false,
            'in_stock' => true
        ],
        [
            'id' => 11,
            'name' => 'Pak Special Bracelet - Set 1',
            'short_description' => 'Handcrafted bracelet for Pakistan Love',
            'description' => 'Celebrate Pakistan Independence Day in style with patriotic bracelets featuring green and white designs, perfect for showing your national pride!',
            'price' => 200,
            'image' => 'assets/images/pak1.jpg',
            'category' => 'Collection',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 12,
            'name' => 'Pak Special Bracelet - Set 2',
            'short_description' => 'HandCrafted  bracelet for Pakistan Love',
            'description' => 'Celebrate Pakistan Independence Day in style with patriotic bracelets featuring green and white designs, perfect for showing your national pride!',
            'price' => 200,
            'image' => 'assets/images/pak3.jpg',
            'category' => 'Collection',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 13,
            'name' => 'Pak Special Bracelet - Set 3',
            'short_description' => 'HandCrafted bracelet for Pakistan Love',
            'description' => 'Celebrate Pakistan Day in style with patriotic bracelets featuring green and white designs, perfect for showing your national pride!',
            'price' => 200,
            'image' => 'assets/images/pak4.jpg',
            'category' => 'Collection',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 14,
            'name' => 'Pak Special Bracelet - Set 4',
            'short_description' => 'HandCrafted bracelet for Pakistan Love',
            'description' => 'Celebrate Pakistan Day in style with patriotic bracelets featuring green and white designs, perfect for showing your national pride!',
            'price' => 200,
            'image' => 'assets/images/pak5.jpg',
            'category' => 'Collection',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 15,
            'name' => 'Pak Special Bracelet - Set 5',
            'short_description' => 'Handcrafted bracelet for Pakistan Love',
            'description' => 'Celebrate Pakistan Day in style with patriotic bracelets featuring green and white designs, perfect for showing your national pride!',
            'price' => 200,
            'image' => 'assets/images/pak6.jpg',
            'category' => 'Collection',
            'featured' => true,
            'in_stock' => true
        ],
        [
            'id' => 16,
            'name' => 'Pak Special Bracelet Set 6',
            'short_description' => 'HandCrafted bracelet for Pakistan Love',
            'description' => 'Celebrate Pakistan Day in style with patriotic bracelets featuring green and white designs, perfect for showing your national pride!',
            'price' => 200,
            'image' => 'assets/images/pak7.jpg',
            'category' => 'Collection',
            'featured' => false,
            'in_stock' => true
        ]
    ];
    
    return $limit ? array_slice($products, 0, $limit) : $products;
}

function getSampleProduct($id) {
    $products = getSampleProducts();
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            // Add additional images for product gallery
            $product['additional_images'] = getProductAdditionalImages($id);
            return $product;
        }
    }
    return null;
}

// Get additional images for product gallery
function getProductAdditionalImages($productId) {
    $imageMap = [
        1 => ['assets/images/1.jpg', 'assets/images/1.1.jpg'],
        2 => ['assets/images/2.jpg', 'assets/images/2.1.jpg'],
        3 => ['assets/images/3.jpg', 'assets/images/3.1.jpg'],
        4 => ['assets/images/4.jpg', 'assets/images/4.1.jpg'],
        5 => ['assets/images/5.jpg', 'assets/images/5.1.jpg'],
        6 => ['assets/images/6.jpg', 'assets/images/6.1.jpg'],
        7 => ['assets/images/7.jpg', 'assets/images/7.1.jpg'],
        8 => ['assets/images/8.jpg', 'assets/images/8.1.jpg'],
        9 => ['assets/images/9.jpg', 'assets/images/9.1.jpg'],
        10 => ['assets/images/10.jpg', 'assets/images/10.1.jpg']
    ];
    
    return isset($imageMap[$productId]) ? $imageMap[$productId] : [];
}

function getSampleCategories() {
    return [
        ['category' => 'Pearl'],
        ['category' => 'Charm'],
        ['category' => 'Collection']
    ];
}

// Utility functions
function formatPrice($price) {
    return 'Rs. ' . number_format($price, 2);
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


// Search functions
function searchProducts($conn, $query, $category = null) {
    if ($conn) {
        try {
            $sql = "SELECT * FROM products WHERE in_stock = 1 AND (name LIKE ? OR short_description LIKE ? OR description LIKE ?)";
            $params = ["%$query%", "%$query%", "%$query%"];
            
            if ($category) {
                $sql .= " AND category = ?";
                $params[] = $category;
            }
            
            $sql .= " ORDER BY created_at DESC";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return searchSampleProducts($query, $category);
        }
    }
    return searchSampleProducts($query, $category);
}

function searchSampleProducts($query, $category = null) {
    $products = getSampleProducts();
    $results = [];
    
    foreach ($products as $product) {
        $matches = false;
        
        // Check if query matches name, description, or category
        if (stripos($product['name'], $query) !== false ||
            stripos($product['short_description'], $query) !== false ||
            stripos($product['description'], $query) !== false) {
            $matches = true;
        }
        
        // Filter by category if specified
        if ($category && $product['category'] !== $category) {
            $matches = false;
        }
        
        if ($matches) {
            $results[] = $product;
        }
    }
    
    return $results;
}

// Pagination helper
function paginate($total, $perPage, $currentPage) {
    $totalPages = ceil($total / $perPage);
    $offset = ($currentPage - 1) * $perPage;
    
    return [
        'total' => $total,
        'per_page' => $perPage,
        'current_page' => $currentPage,
        'total_pages' => $totalPages,
        'offset' => $offset,
        'has_previous' => $currentPage > 1,
        'has_next' => $currentPage < $totalPages,
        'previous_page' => $currentPage - 1,
        'next_page' => $currentPage + 1
    ];
}
?> 