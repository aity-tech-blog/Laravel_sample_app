FROM php:8.3-apache

# PHP拡張のインストール
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Apache mod_rewrite を有効化
RUN a2enmod rewrite

# vhost 設定を差し替え（DocumentRoot を public にする）
COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf

# .htaccess を有効にするための設定
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# 作業ディレクトリ
WORKDIR /var/www/html

# プロジェクトファイルをコピー
COPY . .

# Laravel依存インストール
RUN composer install --no-dev --optimize-autoloader

# Laravel キャッシュ生成（envはRenderの環境変数から渡される前提）
RUN php artisan config:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# 必要なディレクトリの権限調整
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# ポート公開
EXPOSE 80

# Apache をフォアグラウンドで起動
CMD ["apache2ctl", "-D", "FOREGROUND"]
