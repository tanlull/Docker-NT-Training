#Laravel composer
FROM composer:2.3.5 as build-composer
WORKDIR /app-composer
COPY ./ ./
#Production
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction
#npm install

FROM node:16-alpine as build-npm
WORKDIR /app-npm
COPY --from=build-composer /app-composer ./
RUN npm install
#for dev 
#RUN npm run dev
#for production
RUN npm run prod

#Production stage
FROM richarvey/nginx-php-fpm:2.1.2 as production
ENV WEBROOT /var/www/tan-laravel/public
RUN rm -rf /var/www/html
RUN mkdir /var/www/tan-laravel
RUN chown -R nginx:nginx /var/www/tan-laravel/
WORKDIR /var/www/tan-laravel

COPY --from=build-npm /app-npm /var/www/tan-laravel

# COPY ./docker-php/nginx-site.conf /etc/nginx/sites-available/default.conf
# COPY ./docker-php/supervisord.conf /etc/supervisord.conf
ENV APP_ENV=production
ENV APP_DEBUG=false

# for development
RUN chmod 777 -R /var/www/tan-laravel/storage/ 
# for production
# RUN php artisan config:cache && \
#     php artisan route:cache && \
#     chmod 777 -R /var/www/tan-laravel/storage/
