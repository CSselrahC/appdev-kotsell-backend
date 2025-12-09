# 1. Start services & build (3-5 min)
docker-compose up -d --build
timeout /t 90

# 2. Create .env file (paste team lead's contents)
# MANUAL: Create src/.env → Paste provided .env contents

# 3. Install Composer dependencies (10-15 min, needs process-timeout)
docker-compose exec app composer install --ignore-platform-reqs

# 4. Generate app key & seed database (35+ records)
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate:fresh --seed

# 5. Create storage links & fix permissions
docker-compose exec app php artisan storage:link
docker-compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Restart services
docker-compose restart
