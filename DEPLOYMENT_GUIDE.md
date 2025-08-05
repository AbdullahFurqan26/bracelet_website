# 🚀 Free Hosting Deployment Guide for Pulse Wear Website

## 📋 Prerequisites
- Your website files (PHP, CSS, JS, images)
- A free hosting account (recommended: InfinityFree)
- Basic understanding of file uploads

## 🎯 Recommended Hosting: InfinityFree

### Step 1: Sign Up for InfinityFree
1. Go to [infinityfree.net](https://infinityfree.net)
2. Click "Sign Up" and create a free account
3. Verify your email address

### Step 2: Create a Website
1. Log in to your InfinityFree account
2. Click "Create Account" in the hosting section
3. Choose a subdomain (e.g., `yourname.infinityfreeapp.com`) or connect a custom domain
4. Wait for account activation (usually 5-10 minutes)

### Step 3: Access Your Database
1. In your hosting control panel, go to "MySQL Databases"
2. Create a new database
3. Note down:
   - Database host (usually `sql.infinityfree.com`)
   - Database name (e.g., `yourname_pulse_wear`)
   - Database username
   - Database password

### Step 4: Update Database Configuration
1. Open `includes/db_connect_production.php`
2. Replace the placeholder values with your actual database credentials:
   ```php
   $host = 'sql.infinityfree.com'; // Your database host
   $dbname = 'yourname_pulse_wear'; // Your database name
   $username = 'yourname'; // Your database username
   $password = 'your_password'; // Your database password
   ```
3. Rename `db_connect_production.php` to `db_connect.php` (backup the original first)

### Step 5: Upload Your Files
1. In your hosting control panel, go to "File Manager"
2. Navigate to the `htdocs` or `public_html` folder
3. Upload all your website files:
   - `index.php`
   - `about.php`
   - `products.php`
   - `product.php`
   - `contact.php`
   - `includes/` folder
   - `assets/` folder

### Step 6: Set Up Images
1. Create placeholder images or upload your actual product images
2. Place them in the `assets/images/` folder
3. Make sure image paths match those in your database

### Step 7: Test Your Website
1. Visit your website URL
2. Check if the database connection works
3. Test the contact form functionality
4. Verify all pages load correctly

## 🔧 Alternative Hosting Options

### 000webhost (by Hostinger)
- **URL**: [000webhost.com](https://000webhost.com)
- **Features**: Free SSL, PHP 8.0+, MySQL
- **Limits**: 1GB storage, 1GB bandwidth
- **Process**: Similar to InfinityFree

### Awardspace
- **URL**: [awardspace.com](https://awardspace.com)
- **Features**: 1GB storage, 5GB bandwidth, MySQL
- **Process**: Sign up, create hosting account, upload files

## 🛠️ Troubleshooting

### Common Issues:
1. **Database Connection Error**
   - Verify database credentials
   - Check if database exists
   - Ensure MySQL is enabled

2. **Images Not Loading**
   - Check file paths
   - Verify image files are uploaded
   - Check file permissions

3. **PHP Errors**
   - Check PHP version compatibility
   - Review error logs in hosting control panel

### File Permissions:
- Set folders to 755
- Set files to 644
- Set `includes/` folder to 755

## 📱 Mobile Optimization
Your website is already mobile-responsive! The CSS includes:
- Responsive design
- Mobile navigation
- Touch-friendly buttons

## 🔒 Security Tips
1. Keep your database credentials secure
2. Regularly backup your files
3. Update your website regularly
4. Use strong passwords

## 📈 Next Steps
1. **Custom Domain**: Consider purchasing a custom domain
2. **SSL Certificate**: Most free hosts provide free SSL
3. **Analytics**: Add Google Analytics to track visitors
4. **SEO**: Optimize your content for search engines

## 🆘 Support
- **InfinityFree**: Community forums and documentation
- **000webhost**: Help center and tutorials
- **Awardspace**: Support tickets and guides

## 🎉 Success!
Once deployed, your Pulse Wear bracelet website will be live and accessible to customers worldwide!

---
*Need help? Check the hosting provider's documentation or community forums for specific guidance.* 