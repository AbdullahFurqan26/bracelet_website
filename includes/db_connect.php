<?php
// Database configuration
$host = 'localhost';
$dbname = 'pulse_wear';
$username = 'root';
$password = '';

// Temporarily disable database connection to use sample data
// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// } catch(PDOException $e) {
//     // For demo purposes, we'll create a fallback with sample data
//     $conn = null;
// }

// Force use of sample data
$conn = null;

// Create database and tables if they don't exist
function createDatabase() {
    global $host, $username, $password;
    
    try {
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create database
        $pdo->exec("CREATE DATABASE IF NOT EXISTS pulse_wear CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE pulse_wear");
        
        // Create products table
        $pdo->exec("CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            short_description TEXT,
            description TEXT,
            price DECIMAL(10,2) NOT NULL,
            image VARCHAR(255),
            category VARCHAR(100),
            featured BOOLEAN DEFAULT FALSE,
            in_stock BOOLEAN DEFAULT TRUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        
        // Create orders table
        $pdo->exec("CREATE TABLE IF NOT EXISTS orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            customer_name VARCHAR(255) NOT NULL,
            customer_email VARCHAR(255) NOT NULL,
            customer_phone VARCHAR(50),
            shipping_address TEXT,
            total_amount DECIMAL(10,2) NOT NULL,
            status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        
        // Create order_items table
        $pdo->exec("CREATE TABLE IF NOT EXISTS order_items (
            id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT,
            product_id INT,
            quantity INT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id),
            FOREIGN KEY (product_id) REFERENCES products(id)
        )");
        
        // Insert sample products
        insertSampleProducts($pdo);
        
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

// Insert sample products
function insertSampleProducts($pdo) {
    $products = [
        [
            'name' => 'Elegant Silver Chain Bracelet',
            'short_description' => 'Timeless silver chain bracelet with delicate links',
            'description' => 'This elegant silver chain bracelet features delicate links that create a sophisticated look. Perfect for everyday wear or special occasions. Made from high-quality sterling silver.',
            'price' => 89.99,
            'image' => 'assets/images/1.jpg',
            'category' => 'Silver',
            'featured' => true
        ],
        [
            'name' => 'Rose Gold Infinity Bracelet',
            'short_description' => 'Beautiful rose gold infinity symbol bracelet',
            'description' => 'A stunning rose gold bracelet featuring an infinity symbol, representing endless love and possibilities. Perfect gift for someone special.',
            'price' => 129.99,
            'image' => 'assets/images/2.jpg',
            'category' => 'Rose Gold',
            'featured' => true
        ],
        [
            'name' => 'Pearl and Crystal Bracelet',
            'short_description' => 'Elegant pearl bracelet with crystal accents',
            'description' => 'This beautiful bracelet combines freshwater pearls with sparkling crystals for a luxurious look. Perfect for formal events and special occasions.',
            'price' => 149.99,
            'image' => 'assets/images/3.jpg',
            'category' => 'Pearl',
            'featured' => true
        ],
        [
            'name' => 'Leather Wrap Bracelet',
            'short_description' => 'Stylish leather wrap bracelet with silver details',
            'description' => 'A trendy leather wrap bracelet with silver hardware. Adjustable fit makes it perfect for any wrist size. Great for casual and bohemian styles.',
            'price' => 45.99,
            'image' => 'assets/images/4.jpg',
            'category' => 'Leather',
            'featured' => true
        ],
        [
            'name' => 'Diamond Accent Tennis Bracelet',
            'short_description' => 'Luxurious tennis bracelet with diamond accents',
            'description' => 'A classic tennis bracelet featuring sparkling diamond accents set in white gold. The epitome of elegance and sophistication.',
            'price' => 299.99,
            'image' => 'assets/images/5.jpg',
            'category' => 'Diamond',
            'featured' => true
        ],
        [
            'name' => 'Charm Bracelet Collection',
            'short_description' => 'Personalizable charm bracelet with multiple charms',
            'description' => 'Create your own story with this charm bracelet. Includes multiple charms that can be personalized. Perfect for collecting memories and milestones.',
            'price' => 79.99,
            'image' => 'assets/images/6.jpg',
            'category' => 'Charm',
            'featured' => true
        ],
        [
            'name' => 'Gold Chain Bracelet',
            'short_description' => 'Classic gold chain bracelet with elegant design',
            'description' => 'A timeless gold chain bracelet that adds sophistication to any outfit. Perfect for both casual and formal occasions.',
            'price' => 199.99,
            'image' => 'assets/images/7.jpg',
            'category' => 'Gold',
            'featured' => false
        ],
        [
            'name' => 'Crystal Beaded Bracelet',
            'short_description' => 'Sparkling crystal beaded bracelet with silver accents',
            'description' => 'This stunning bracelet features high-quality crystal beads strung together with silver accents. Perfect for adding sparkle to any outfit.',
            'price' => 85.99,
            'image' => 'assets/images/8.jpg',
            'category' => 'Crystal',
            'featured' => false
        ],
        [
            'name' => 'Crystal Beaded Bracelet',
            'short_description' => 'Sparkling crystal beaded bracelet with silver accents',
            'description' => 'This stunning bracelet features high-quality crystal beads strung together with silver accents. Perfect for adding sparkle to any outfit.',
            'price' => 85.99,
            'image' => 'assets/images/9.jpg',
            'category' => 'Crystal',
            'featured' => false
        ],
        [
            'name' => 'Elegant Pearl Bracelet',
            'short_description' => 'Sophisticated pearl bracelet with gold clasp',
            'description' => 'A beautiful pearl bracelet featuring high-quality freshwater pearls with an elegant gold clasp. Perfect for formal occasions.',
            'price' => 165.99,
            'image' => 'assets/images/10.jpg',
            'category' => 'Pearl',
            'featured' => false
        ],
        [
            'name' => 'Silver Charm Bracelet',
            'short_description' => 'Delicate silver charm bracelet with multiple charms',
            'description' => 'This charming bracelet features multiple delicate charms on a silver chain. Perfect for collecting memories and milestones.',
            'price' => 95.99,
            'image' => 'assets/images/11.jpg',
            'category' => 'Charm',
            'featured' => false
        ],
        [
            'name' => 'Pulse Wear Collection Set',
            'short_description' => 'Exclusive collection featuring our signature designs',
            'description' => 'This exclusive collection showcases our signature designs with premium materials and craftsmanship. A must-have for any jewelry collection.',
            'price' => 299.99,
            'image' => 'assets/images/pak1.jpg',
            'category' => 'Collection',
            'featured' => true
        ]
    ];
    
    $stmt = $pdo->prepare("INSERT IGNORE INTO products (name, short_description, description, price, image, category, featured) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    foreach ($products as $product) {
        $stmt->execute([
            $product['name'],
            $product['short_description'],
            $product['description'],
            $product['price'],
            $product['image'],
            $product['category'],
            $product['featured']
        ]);
    }
}

// Initialize database if connection fails
if (!$conn) {
    createDatabase();
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // If database still fails, we'll use sample data
        $conn = null;
    }
}
?> 