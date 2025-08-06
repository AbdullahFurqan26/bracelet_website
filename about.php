<?php
session_start();
require_once 'includes/db_connect.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Pulse Wear</title>
    <meta name="description" content="Learn about Pulse Wear's story, our commitment to quality, and the passion behind our handcrafted bracelets.">
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
                        <a href="about.php" class="nav-link active">About</a>
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
                <h1 class="page-title">Our Story</h1>
                <p class="page-subtitle">Crafting elegance, one bracelet at a time</p>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="story-content">
                <div class="story-text">
                    <h2>The Pulse Wear Journey</h2>
                    <p>Welcome to PulseWear Bracelets – a brand born from creativity, love, and family support.. What started as a passion has now turned into a growing business, all thanks to the constant encouragement and financial support of my parents. They believed in my talent and transformed my dream into a reality by investing in my skills and turning my creativity into a brand.</p>
                    <P> Every bracelet at PulseWear carries a piece of that journey – a symbol of love, hard work, and the belief that with the right support, anything is possible. Your purchase would make our day . </P>
                    <p>Today, we continue to honor our roots while embracing innovation, ensuring that each bracelet not only looks stunning but also stands the test of time.</p>
                </div>
                <div class="story-image">
                    <img src="assets/images/main.jpg" alt="Pulse Wear Workshop and Collection" class="story-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Values</h2>
                <p class="section-subtitle">The principles that guide everything we do</p>
            </div>
            <div class="values-grid">
                <div class="value-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Passion</h3>
                    <p>We pour our hearts into every piece, ensuring that each bracelet is crafted with love and dedication.</p>
                </div>
                <div class="value-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Quality</h3>
                    <p>We never compromise on quality, using only the finest materials and techniques in our craftsmanship.</p>
                </div>
                <div class="value-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Sustainability</h3>
                    <p>We're committed to ethical practices and sustainable sourcing, protecting our planet for future generations.</p>
                </div>
                <div class="value-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community</h3>
                    <p>We believe in building meaningful connections with our customers and supporting our local community.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Process</h2>
                <p class="section-subtitle">From concept to creation, here's how we bring your bracelet to life</p>
            </div>
            <div class="process-steps">
                <div class="process-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h3>Design</h3>
                        <p>Every bracelet begins with inspiration and careful design planning, ensuring both beauty and functionality.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h3>Material Selection</h3>
                        <p>We carefully select the finest materials, ensuring lasting quality.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h3>Craftsmanship</h3>
                        <p>Our skilled artisans handcraft each piece with precision and care, using traditional techniques.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-number">04</div>
                    <div class="step-content">
                        <h3>Quality Control</h3>
                        <p>Every piece undergoes rigorous quality checks to ensure it meets our high standards before reaching you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Meet Our Team</h2>
                <p class="section-subtitle">The passionate individuals behind Pulse Wear</p>
            </div>
            <div class="team-grid">
                <div class="team-member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-image">
                        <img src="assets/images/female1.jpg" alt="Hafsa Abdul Wasay - Founder & Creative Director" class="member-img">
                    </div>
                    <div class="member-info">
                        <h3>Hafsa Abdul Wasay</h3>
                        <span class="member-role">Founder & Creative Director</span>
                        <p>With over 2 years of experience in jewellery design, Hafsa brings her artistic vision and passion to every piece.</p>
                    </div>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-delay="200">
                    <div class="member-image">
                        <img src="assets/images/male.jpg" alt="Abdullah Furqan - Software Developer" class="member-img">
                    </div>
                    <div class="member-info">
                        <h3>Abdullah Furqan</h3>
                        <span class="member-role">Software Developer</span>
                        <p>Abdullah sharp problem-solving skills and attention to detail ensure that every line of code is crafted to perfection.</p>
                    </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">Bracelets Crafted</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Years of Excellence</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Quality Guarantee</div>
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