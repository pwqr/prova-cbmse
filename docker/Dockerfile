FROM webdevops/php-nginx:8.2

RUN apt-get update && \
    apt-get install -y curl libpq-dev gcc make autoconf libc-dev pkg-config && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql fileinfo

WORKDIR /app

COPY . /app

RUN mkdir -p /app/storage /app/bootstrap/cache \
    && chown -R www-data:www-data /app \
    && chmod -R 775 /app/storage \
    && chmod -R 775 /app/bootstrap/cache
