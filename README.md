# Laravel Food Store E-commerce Project  

A full-featured e-commerce platform built for food/grocery stores using Laravel, offering both customer-facing shopping experience and admin management capabilities.  

## Features  

### Customer Features  
- Product browsing and searching  
- Shopping cart functionality with cookie-based storage  
- Product categorization and filtering  
- Secure checkout process  
- Order tracking  
- User account management  
- Responsive frontend design (based on **Fruitkha** template)  

### Admin Features  
- Dashboard with sales analytics  
- Product management (CRUD operations)  
- Order management and tracking  
- User management  
- Inventory management  
- Admin authentication with role-based access  

## Technologies Used  

### Backend  
- PHP 8.1+  
- Laravel 10.x  
- MySQL Database  
- Laravel Sanctum for API authentication  
- Intervention/Image for image processing  

### Frontend  
- **Fruitkha** - Free Bootstrap 4 Food Business Template ([Download & Info](https://themewagon.com/themes/fruitkha-free-bootstrap-4-responsive-food-business-template/))  
- Blade templating engine  
- JavaScript  
- Bootstrap  
- AJAX for dynamic content loading  

### Other Tools & Services  
- Composer for PHP package management  
- Git for version control  
- Laravel Mix for asset compilation  
- Nginx or Apache for web hosting  
- Postman for API testing  

## Installation  

### 1. Clone the repository  
```bash  
git clone [your-repository-url]  
cd [project-directory]  
```
### 2. Install PHP dependencies  
```bash  
composer install  
```
### 3. Create and configure environment file  
```bash  
cp .env.example .env  
php artisan key:generate  
```
### 4. Configure your database in `.env` file  
```env  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=your_database_username  
DB_PASSWORD=your_database_password  
```
### 5. Run database migrations and seeders  
```bash  
php artisan migrate  
php artisan db:seed  
```
### 6. Create storage link  
```bash  
php artisan storage:link  
```
### 7. Install Node.js dependencies (for Laravel Mix)  
```bash  
npm install  
```
### 8. Compile assets (CSS, JS)  
```bash  
npm run dev  
```
### 9. Start the development server  
```bash  
php artisan serve  
```
## Deployment  

### Steps for Deployment on a Production Server  
1. Upload project files to your server  
2. Set up the database and configure `.env`  
3. Run migrations and seeders  
4. Set proper file permissions  

   ```bash  
   chmod -R 775 storage bootstrap/cache
   ```  
5. Configure Nginx/Apache for Laravel  
6. Set up Supervisor for queue workers (if applicable)  
7. Optimize application  
   ```bash  
   php artisan optimize
   ```  
8. Use Laravel Scheduler for periodic tasks  

## Database Structure  

The project includes the following main tables:  
- `users`  
- `products`  
- `orders`  
- `order_items`  
- `password_reset_tokens`  

## API Routes  

The application provides both web routes and API endpoints for various functionalities:  

### Web Routes  
- Authentication routes  
- Product browsing  
- Cart management  
- Checkout process  
- Admin dashboard  

### API Routes  
- Product search  
- Cart operations  
- Order management  

## Security Features  
- CSRF Protection  
- SQL Injection Prevention  
- XSS Protection  
- Secure Password Hashing  
- Role-based Authentication  
- Session Management  

## Additional Enhancements  
- **Email Notifications**: Send order confirmation emails using Laravel Mail  
- **Payment Integration** (Optional): Stripe/PayPal integration for online payments  
- **Multi-Language Support**: Using Laravel localization  
- **SEO Optimization**: Meta tags and structured data for search engines  

## Contributing  

1. Fork the repository  
2. Create your feature branch:  

   ``` bash  
   git checkout -b feature/AmazingFeature
   ```  
3. Commit your changes:  

   ```bash  
   git commit -m 'Add some AmazingFeature'
   ```  
4. Push to the branch:
  
   ```bash 
   git push origin feature/AmazingFeature  
   ```
5. Open a Pull Request  

## License  

This project is licensed under the MIT License - see the LICENSE file for details.  

## Acknowledgments  
- **Fruitkha Template** - Free Bootstrap 4 Template ([Link](https://themewagon.com/themes/fruitkha-free-bootstrap-4-responsive-food-business-template/))  
- Laravel Documentation  
- Laravel Community  
- Bootstrap Documentation  

## Contact  
Abdul Rafay- rafaycs21@gmail.com  
Project Link: https://github.com/e-commerce-food-store  
