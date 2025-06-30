FROM php:8.3-fpm

# 必要なパッケージと拡張をインストール
RUN apt-get update && apt-get install -y \
    git unzip curl zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    nginx gettext-base \
    && docker-php-ext-install zip pdo pdo_mysql mbstring exif pcntl bcmath

# Composer インストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 作業ディレクトリ
WORKDIR /var/www

# Laravel プロジェクトをコピー
COPY . .

# 依存インストール（--no-dev で本番用）
RUN composer install --no-dev --optimize-autoloader

# パーミッション修正（必要であれば）
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# nginx.confをコピー
COPY ./docker/nginx.conf /etc/nginx/templates/default.conf.template

# エントリポイント（nginxとphp両方起動）
CMD sh -c "envsubst '\$PORT' < /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf && nginx && php-fpm"
