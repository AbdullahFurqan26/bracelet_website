<?php
// Production Database configuration
// Update these values with your hosting provider's database credentials
$host = 'your_hosting_provider_host'; // e.g., 'sql.infinityfree.com'
$dbname = 'your_database_name'; // e.g., 'yourusername_pulse_wear'
$username = 'your_database_username'; // e.g., 'yourusername'
$password = 'your_database_password'; // Your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // For demo purposes, we'll create a fallback with sample data
    $conn = null;
}

// Create database and tables if they don't exist
function createDatabase() {
    global $host, $username, $password, $dbname;
    
    try {
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create database
        $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE $dbname");
        
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
            'image' => 'assets/images/bracelet-1.jpg',
            'category' => 'Silver',
            'featured' => true
        ],
        [
            'name' => 'Rose Gold Infinity Bracelet',
            'short_description' => 'Beautiful rose gold infinity symbol bracelet',
            'description' => 'A stunning rose gold bracelet featuring an infinity symbol, representing endless love and possibilities. Perfect gift for someone special.',
            'price' => 129.99,
            'image' => 'assets/images/bracelet-2.jpg',
            'category' => 'Rose Gold',
            'featured' => true
        ],
        [
            'name' => 'Pearl and Crystal Bracelet',
            'short_description' => 'Elegant pearl bracelet with crystal accents',
            'description' => 'This beautiful bracelet combines freshwater pearls with sparkling crystals for a luxurious look. Perfect for formal events and special occasions.',
            'price' => 149.99,
            'image' => 'assets/images/bracelet-3.jpg',
            'category' => 'Pearl',
            'featured' => true
        ],
        [
            'name' => 'Leather Wrap Bracelet',
            'short_description' => 'Stylish leather wrap bracelet with silver details',
            'description' => 'A trendy leather wrap bracelet with silver hardware. Adjustable fit makes it perfect for any wrist size. Great for casual and bohemian styles.',
            'price' => 45.99,
            'image' => 'assets/images/bracelet-4.jpg',
            'category' => 'Leather',
            'featured' => true
        ],
        [
            'name' => 'Diamond Accent Tennis Bracelet',
            'short_description' => 'Luxurious tennis bracelet with diamond accents',
            'description' => 'A classic tennis bracelet featuring sparkling diamond accents set in white gold. The epitome of elegance and sophistication.',
            'price' => 299.99,
            'image' => 'assets/images/bracelet-5.jpg',
            'category' => 'Diamond',
            'featured' => true
        ],
        [
            'name' => 'Charm Bracelet Collection',
            'short_description' => 'Personalizable charm bracelet with multiple charms',
            'description' => 'Create your own story with this charm bracelet. Includes multiple charms that can be personalized. Perfect for collecting memories and milestones.',
            'price' => 79.99,
            'image' => 'assets/images/bracelet-6.jpg',
            'category' => 'Charm',
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