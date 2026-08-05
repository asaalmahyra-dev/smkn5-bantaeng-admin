# ♻️ Panduan Redeployment - SMKN 5 Bantaeng Portal

Panduan untuk **redeploy dari awal** project Laravel 13 + Filament 5 Portal SMKN 5 Bantaeng.

---

## 📋 Langkah-langkah Persiapan

### 1. Bersihkan Cache & File Sementara

```bash
# Hapus cache Laravel
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Hapus file log
rm -f storage/logs/laravel.log

# Hapus compiled views
rm -rf storage/framework/views/*.php

# Hapus cache data
rm -rf storage/framework/cache/data/*

# Hapus bootstrap cache
rm -f bootstrap/cache/*.php
```

### 2. Hapus File Development (tidak perlu untuk production)

| File/Folder | Keterangan |
|-------------|------------|
| `node_modules/` | Dependency JS (build ulang di production) |
| `.git/` | Repository Git |
| `tests/` | Unit test |
| `.env` | File konfigurasi local (buat ulang di server) |
| `.agents/`, `.codex/`, `.github/` | Folder development tools |
| `note.md`, `TODO.md`, `AGENTS.md` | Catatan development |
| `endpoint.md`, `RELASI.md`, `ERD .md` | Dokumentasi internal |
| `export_db.php` | Script export database |
| `dataStatic/` | Data statis untuk development |
| `admin.zip`, `resources.zip` | File arsip |

### 3. Build Assets untuk Production

```bash
# Install dependencies & build
npm install
npm run build

# Optimasi Composer (hapus dev dependencies)
composer install --no-dev --optimize-autoloader
```

### 4. Siapkan .env untuk Production

```bash
# Copy dari template
cp .env.production .env

# Generate APP_KEY
php artisan key:generate --show
# Output: base64:xxxxxxxxxxxxxxxxxxxxxxxxx
# Paste value ke .env
```

---

## 🚀 Opsi Deployment

### Opsi 1: Railway (Rekomendasi)

```bash
# 1. Push ke GitHub
git init
git add .
git commit -m "Initial commit - clean"
git remote add origin https://github.com/username/smkn5-bantaeng.git
git push -u origin main

# 2. Deploy via Railway:
#    - Login railway.app → New Project → Deploy from GitHub
#    - Set env variables (APP_KEY, DB credentials)
#    - Add MySQL service
#    - Run via Railway Console:
```

```bash
php artisan storage:link
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Opsi 2: InfinityFree (Saat Ini)

```bash
# 1. Build assets dulu
npm install && npm run build
composer install --no-dev --optimize-autoloader

# 2. Upload via FTP ke https://smkn5-bantaeng-admin.kesug.com/
#    Upload folder: app/, bootstrap/, config/, database/, public/, 
#                   resources/, routes/, storage/, vendor/
#    Upload file: .htaccess, artisan, composer.json, composer.lock,
#                 package.json, vite.config.js, router.php

# 3. Setup manual di hosting:
#    - Buat database MySQL via cPanel
#    - Import database.sql via phpMyAdmin
#    - Upload .env (rename dari .env.production, isi credentials)
#    - Generate APP_KEY via local, paste ke .env
#    - Buat folder public/storage dengan .htaccess rewrite
```

### Opsi 3: VPS (DigitalOcean / Linode)

```bash
# Full script setup VPS:
ssh root@your-server-ip

# Install dependencies
apt update && apt upgrade -y
apt install nginx mysql-server php8.3-fpm php8.3-mysql \
  php8.3-xml php8.3-mbstring php8.3-curl php8.3-zip \
  php8.3-bcmath php8.3-gd php8.3-intl composer git -y

# Clone & setup
cd /var/www
git clone https://github.com/username/smkn5-bantaeng.git
cd smkn5-bantaeng
composer install --no-dev --optimize-autoloader
cp .env.production .env
php artisan key:generate
# Edit .env dengan DB credentials

# Setup database
mysql -u root -p -e "CREATE DATABASE smkn5_bantaeng;"
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Setup Nginx (lihat file DEPLOY.md untuk konfigurasi lengkap)
```

---

## 📦 File yang WAJIB diupload ke Server

```
app/                  # Source code aplikasi
bootstrap/            # Bootstrap Laravel
config/               # Konfigurasi
database/migrations/  # Struktur tabel (migration)
public/               # Front controller + assets (build hasil)
resources/            # Views
routes/               # Route definitions
storage/              # Storage (kosongkan framework/cache, framework/views)
vendor/               # Vendor library
.htaccess             # Apache config
artisan               # Entry point CLI
composer.json         # Dependencies
composer.lock         # Lock file
package.json          # NPM dependencies
vite.config.js        # Vite config
```

## ❌ File yang TIDAK perlu diupload

```
node_modules/         # Build di server atau upload hasil build via public/
.env                  # Buat ulang di server
.git/                 # Repository
tests/                # Unit test
database.sql          # Import via phpMyAdmin
dataStatic/           # Data development
*.md (catatan)        # Dokumentasi internal (kecuali DEPLOY.md, API_DOCUMENTATION.md)
*.zip                 # File arsip
```

---

## 🔄 Setelah Deploy (Wajib)

```bash
# Di server (jika ada SSH/terminal):
php artisan storage:link
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permission
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/logs storage/framework
```

## ✅ Verifikasi

1. Buka `https://domain-anda.com/` → Halaman welcome
2. Buka `https://domain-anda.com/admin` → Login page Filament
3. Buka `https://domain-anda.com/api/v1/departments` → JSON response
4. Login: `admin@smkn5bantaeng.sch.id` / `password`

---

## 🔐 Login Admin

- **Email:** `admin@smkn5bantaeng.sch.id`
- **Password:** `password`

⚠️ **Segera ganti password setelah login pertama!**

