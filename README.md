# 1. Start services & build
docker-compose up -d --build
wait for about 90 seconds

# 2. Add this line in the config of compose.json
"process-timeout": 1200, 

# 3. Create .env file (copy paste this)
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:2hV+RgY0c7gaBMZckRSIMkXl5R6yhFoQiOLFWfznn8I=
APP_DEBUG=true
APP_URL=http://localhost:8082

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=root
DB_PASSWORD=rootpassword

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=public
QUEUE_CONNECTION=database

CACHE_STORE=database

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

# 3. Install Composer dependencies (10-15 min)
docker-compose exec app composer install --ignore-platform-reqs

# 4. Generate app key & seed database
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate:fresh --seed

# 5. Create storage links & fix permissions
docker-compose exec app php artisan storage:link

# 6. Restart services
docker-compose restart
