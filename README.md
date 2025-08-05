# Pulse Wear - Elegant Bracelet E-commerce Website

A modern, responsive e-commerce website for selling handcrafted bracelets. Built with PHP, HTML5, CSS3, and JavaScript.

## 🌟 Features

### Core Functionality
- **Product Catalog**: Browse and search through elegant bracelet collections
- **Contact System**: Easy communication with customer support for orders
- **Order Management**: Order confirmation and tracking via contact
- **Responsive Design**: Mobile-first approach for all devices

### User Experience
- **Modern UI/UX**: Clean, elegant design with smooth animations
- **Product Filtering**: Search by name, category, and price
- **Product Details**: Comprehensive product information and images
- **Newsletter Subscription**: Stay updated with new collections
- **Contact Form**: Easy communication with customer support

### Technical Features
- **Database Integration**: MySQL database with PDO for secure data handling
- **Session Management**: Secure user session handling
- **Form Validation**: Client and server-side validation
- **SEO Optimized**: Meta tags, structured data, and clean URLs
- **Cross-browser Compatible**: Works on all modern browsers

## 📁 Project Structure

```
bracelett_website/
├── index.php              # Homepage with featured products
├── products.php           # Product catalog with filtering
├── product.php            # Individual product details
├── about.php             # About us page
├── contact.php           # Contact form and information
├── includes/
│   ├── db_connect.php    # Database connection and setup
│   └── functions.php     # Helper functions and utilities
├── assets/
│   ├── css/
│   │   └── style.css     # Main stylesheet
│   ├── js/
│   │   └── main.js       # JavaScript functionality
│   └── images/
│       └── placeholder.html # Image generator for placeholders
└── README.md             # This file
```

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

### Installation Steps

1. **Clone or Download the Project**
   ```bash
   git clone <repository-url>
   cd bracelett_website
   ```

2. **Database Setup**
   - Create a MySQL database named `pulse_wear`
   - Update database credentials in `includes/db_connect.php`:
     ```php
     $host = 'localhost';
     $dbname = 'pulse_wear';
     $username = 'your_username';
     $password = 'your_password';
     ```

3. **Web Server Configuration**
   - Place the project in your web server's document root
   - Ensure PHP has write permissions for session handling

4. **Image Setup**
   - Open `assets/images/placeholder.html` in a browser
   - Download the generated placeholder images
   - Save them in the `assets/images/` directory with the correct names

5. **Access the Website**
   - Navigate to `http://localhost/bracelett_website/`
   - The website should be fully functional

## 🛠️ Configuration

### Database Configuration
The website automatically creates the necessary database tables and sample data if the database connection is successful. If you prefer to set up the database manually:

```sql
-- Create products table
CREATE TABLE products (
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
);

-- Create orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(50),
    shipping_address TEXT,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create order_items table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
```

### Customization

#### Styling
- Edit `assets/css/style.css` to customize colors, fonts, and layout
- The website uses CSS Grid and Flexbox for responsive design
- Color scheme can be modified by changing CSS custom properties

#### Content
- Update product information in `includes/functions.php`
- Modify company information in footer sections
- Update contact details and social media links

#### Functionality
- Add new features by extending `includes/functions.php`
- Implement payment gateway integration in `checkout.php`
- Add email functionality for order confirmations

## 📱 Pages Overview

### Homepage (`index.php`)
- Hero section with call-to-action
- Featured products showcase
- Company features and benefits
- Newsletter subscription

### Product Catalog (`products.php`)
- Grid layout of all products
- Search and filtering functionality
- Category-based navigation
- Sort by price, name, or newest

### Product Details (`product.php`)
- High-quality product images
- Detailed product information
- Contact for order functionality
- Related products suggestions

### About Us (`about.php`)
- Company story and values
- Team member profiles
- Process explanation
- Statistics and achievements

### Contact (`contact.php`)
- Contact form with validation
- Multiple contact methods
- FAQ section
- Location information

## 🎨 Design Features

### Color Scheme
- Primary: Purple gradient (#667eea to #764ba2)
- Secondary: Pink gradient (#f093fb to #f5576c)
- Neutral: Grays and whites for content
- Accent: Green for success states

### Typography
- Headings: Playfair Display (serif)
- Body: Inter (sans-serif)
- Clean, readable hierarchy

### Animations
- Smooth hover effects
- Fade-in animations on scroll
- Loading states and transitions
- Interactive feedback

## 🔧 Technical Details

### PHP Features
- PDO for database operations
- Session management for user data
- Input sanitization and validation
- Error handling and fallbacks

### JavaScript Features
- Form validation and formatting
- Smooth scrolling and animations
- Mobile menu functionality

### CSS Features
- CSS Grid and Flexbox layouts
- Responsive design with media queries
- CSS custom properties for theming
- Modern animations and transitions

## 🚀 Deployment

### Production Setup
1. **Environment Configuration**
   - Set up production database
   - Configure web server (Apache/Nginx)
   - Enable HTTPS with SSL certificate

2. **Security Measures**
   - Update database credentials
   - Implement proper error handling
   - Add rate limiting for forms
   - Enable CSRF protection

3. **Performance Optimization**
   - Enable PHP OPcache
   - Configure web server caching
   - Optimize images and assets
   - Minify CSS and JavaScript

### Recommended Hosting
- Shared hosting with PHP support
- VPS with LAMP/LEMP stack
- Cloud hosting (AWS, Google Cloud, etc.)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 📞 Support

For support or questions:
- Email: hello@pulsewear.com
- Phone: +1 (555) 123-4567
- Website: www.pulsewear.com

## 🔮 Future Enhancements

- User accounts and order history
- Wishlist functionality
- Product reviews and ratings
- Advanced search filters
- Payment gateway integration
- Email marketing integration
- Admin panel for product management
- Multi-language support
- Mobile app development

---

**Pulse Wear** - Elegant bracelets for every occasion. Handcrafted with love and precision. 