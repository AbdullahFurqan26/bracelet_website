# ✅ Deployment Checklist for Pulse Wear Website

## Before Uploading
- [ ] Choose a hosting provider (InfinityFree recommended)
- [ ] Create hosting account and verify email
- [ ] Set up MySQL database
- [ ] Note down database credentials

## File Preparation
- [ ] Update `includes/db_connect_production.php` with your database credentials
- [ ] Rename `db_connect_production.php` to `db_connect.php`
- [ ] Add product images to `assets/images/` folder
- [ ] Test website locally to ensure everything works

## Files to Upload
- [ ] `index.php`
- [ ] `about.php`
- [ ] `products.php`
- [ ] `product.php`
- [ ] `contact.php`
- [ ] `includes/` folder (with updated db_connect.php)
- [ ] `assets/` folder (with CSS, JS, and images)
- [ ] `.htaccess` file

## After Upload
- [ ] Test website URL
- [ ] Check database connection
- [ ] Verify all pages load correctly
- [ ] Test contact form functionality
- [ ] Check mobile responsiveness
- [ ] Verify images display properly

## Database Setup
- [ ] Create database on hosting provider
- [ ] Import database structure (tables will be created automatically)
- [ ] Verify sample products appear on website

## Final Checks
- [ ] Test contact form
- [ ] Verify responsive design on mobile
- [ ] Test all navigation links
- [ ] Check loading speed

## Optional Improvements
- [ ] Add Google Analytics
- [ ] Set up custom domain
- [ ] Configure SSL certificate
- [ ] Add social media links
- [ ] Optimize images for web

## Troubleshooting
- [ ] Check error logs if issues occur
- [ ] Verify file permissions (755 for folders, 644 for files)
- [ ] Ensure database credentials are correct
- [ ] Check PHP version compatibility

---
**Status**: ⏳ Ready to deploy
**Estimated Time**: 30-60 minutes
**Difficulty**: Beginner-friendly 