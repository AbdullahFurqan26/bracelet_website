<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';

$success_message = '';
$error_message = '';

// Handle contact form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);
    
    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        $error_message = 'Please fill in all fields.';
    } elseif (!validateEmail($email)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // In a real application, you would send an email here
        // For demo purposes, we'll just show a success message
        $success_message = 'Thank you for your message! We\'ll get back to you soon.';
        
        // Clear form data
        $name = $email = $phone = $subject = $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Pulse Wear</title>
    <meta name="description" content="Get in touch with Pulse Wear. We're here to help with any questions about our bracelets or your order.">
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
                        <a href="products.php" class="nav-link">Collection</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link active">Contact</a>
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
                <h1 class="page-title">Get in Touch</h1>
                <p class="page-subtitle">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-content">
                <div class="contact-info">
                    <h2>Let's Connect</h2>
                    <p>Have a question about our bracelets? Need help with your order? We're here to help! Reach out to us through any of the channels below.</p>
                    
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="method-details">
                                <h3>Email Us</h3>
                                <p>naturelover8100@gmail.com</p>
                                <span>We'll respond within 24 hours</span>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="method-details">
                                <h3>Call Us</h3>
                                <p>+92 331 3269812</p>
                                <span>Mon-Sat, 12AM-5PM PKT</span>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="method-details">
                                <h3>Visit Us</h3>
                                <p>Karachi, Pakistan</p>
                                <span>Delivery only available in Karachi</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-contact">
                        <h3>Follow Us</h3>
                        <div class="social-links-large">
                            <a href="https://youtube.com/@pulse_wear?si=SmwRQ23bq9FDo0i1" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-youtube"></i>
                                <span>YouTube</span>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=923313269812&text=Hi%20Pulse%20Wear!%20I%20would%20like%20to%20inquire%20about%20your%20bracelets." target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <div class="contact-form-wrapper">
                        <h2>Send us a Message</h2>
                        
                        <?php if ($success_message): ?>
                        <div class="success-message">
                            <i class="fas fa-check-circle"></i>
                            <span><?php echo $success_message; ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($error_message): ?>
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span><?php echo $error_message; ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <div class="delivery-notice">
                            <i class="fas fa-info-circle"></i>
                            <strong>Delivery only available in Karachi</strong>
                        </div>
                        
                        <form method="POST" class="contact-form">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" placeholder="+92 300 1234567" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <select id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="Order Inquiry" <?php echo (isset($subject) && $subject === 'Order Inquiry') ? 'selected' : ''; ?>>Order Inquiry</option>
                                    <option value="Product Information" <?php echo (isset($subject) && $subject === 'Product Information') ? 'selected' : ''; ?>>Product Information</option>
                                    <option value="General Question" <?php echo (isset($subject) && $subject === 'General Question') ? 'selected' : ''; ?>>General Question</option>
                                    <option value="Other" <?php echo (isset($subject) && $subject === 'Other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="6" placeholder="Please include product details, quantity, and delivery address if placing an order." required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                            </div>
                            
                            <button type="submit" name="contact_form" class="btn btn-primary btn-large">
                                <i class="fas fa-paper-plane"></i>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <section id="faq-section" class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Find answers to common questions about our bracelets and services</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What materials do you use?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We use only the finest materials including glass beads, elastic string, wire, lobster hooks. All our materials are carefully selected for quality and durability.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do I care for my bracelet?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Clean your bracelet with a soft cloth and store it in a cool, dry place. Avoid exposure to chemicals, perfumes, and water. For detailed care instructions, please refer to our care guide.</p>
                    </div>
                </div>
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
                        <li><a href="#faq-section">FAQ</a></li>
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
        // FAQ functionality
        document.addEventListener('DOMContentLoaded', function() {
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const faqItem = this.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const icon = this.querySelector('i');
                    
                    // Toggle active state
                    faqItem.classList.toggle('active');
                    
                    // Toggle answer visibility
                    if (faqItem.classList.contains('active')) {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    } else {
                        answer.style.maxHeight = '0';
                        icon.style.transform = 'rotate(0deg)';
                    }
                });
        });
    });
    </script>
</body>
</html> 