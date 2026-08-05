# 🚀 Deployment Guide - SMKN 5 Bantaeng Portal

> Aplikasi ini adalah **Laravel 13 + Filament 5** yang berfungsi sebagai **Backend API + Admin Panel** untuk Portal SMKN 5 Bantaeng.
>
> **Teknologi:** PHP 8.3, MySQL, Laravel 13, Filament 5, Livewire 4

---

## 📋 Daftar Isi

1. [🚀 Railway (Rekomendasi Utama)](#1-railway-rekomendasi-utama)
2. [🆓 InfinityFree (Shared Hosting Gratis - Saat Ini)](#2-infinityfree-shared-hosting-gratis)
3. [☁️ VPS DigitalOcean / Linode / Vultr](#3-vps-digitalocean--linode--vultr)
4. [🐳 Laravel Forge + VPS](#4-laravel-forge--vps)
5. [🌐 Hosting Berbayar Indonesia (Niagahoster / DomaiNesia)](#5-hosting-berbayar-indonesia-niagahoster--domainesia)
6. [📦 Persiapan Awal (Wajib untuk Semua Platform)](#6-persiapan-awal-wajib-untuk-semua-platform)
7. [🔐 Login Admin](#7-login-admin)

---

## 🔍 Perbandingan Platform

| Platform | Harga | SSH/Artisan | Queue/Cron | SSL | Performa | Cocok Untuk |
|----------|-------|-------------|------------|-----|----------|-------------|
| **Railway** ⭐ | $5-20/bln | ✅ Ada | ✅ Full | ✅ Auto | ✅ Tinggi | **Production** |
| **InfinityFree** 🆓 | Gratis | ❌ Tidak | ❌ Terbatas | ✅ Auto | ⚠️ Rendah | Demo/Staging |
| **VPS (DO/Linode)** | $6-12/bln | ✅ Ada | ✅ Full | ✅ Manual | ✅✅ Tinggi | Production skala besar |
| **Laravel Forge** | $12/bln + VPS | ✅ Ada | ✅ Full | ✅ Auto | ✅✅ Tinggi | Tim/Managed |
| **Niagahoster** | Rp 20-50rb/bln | ⚠️ Terbatas | ⚠️ Terbatas | ✅ | ⚠️ Sedang | Budget minimal |

---

## 1. 🚀 Railway (Rekomendasi Utama)

**Website:** https://railway.app

Railway adalah platform cloud modern yang mendukung **deploy langsung dari GitHub**. Support penuh Laravel (artisan, queue, cron).

### Kelebihan:
- ✅ Deploy dari GitHub — auto-detect Laravel
- ✅ Support **artisan commands** via CLI
- ✅ Queue worker & cron job scheduling
- ✅ SSL (HTTPS) otomatis
- ✅ MySQL / PostgreSQL via add-on
- ✅ Environment variables management via UI
- ✅ Auto-deploy ketika push ke branch

### Langkah Deployment:

```bash
# 1. Push project ke GitHub
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/username/smkn5-bantaeng.git
git push -u origin main

# 2. Generate APP_KEY (dari local)
php artisan key:generate --show
# Output: base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
# Simpan key ini!
```

**3. Deploy di Railway Dashboard:**
```
1. Login ke https://railway.app (login via GitHub)
2. Klik "New Project" → "Deploy from GitHub repo"
3. Pilih repository smkn5-bantaeng
4. Railway auto-detect sebagai Laravel project
5. Set Environment Variables:
   APP_KEY=base64:xxxxxxxx...  (dari langkah 2)
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://smkn5-api.up.railway.app
   DB_CONNECTION=mysql
   DB_HOST=         (akan diisi setelah add MySQL)
   DB_PORT=3306
   DB_DATABASE=
   DB_USERNAME=
   DB_PASSWORD=

6. Klik "New" → "Database" → "MySQL" (add MySQL service)
7. Railway akan otomatis provide DB_HOST, DB_USERNAME, DB_PASSWORD
8. Copy credentials MySQL ke environment variables
9. Deploy akan otomatis berjalan
```

**4. Setup Storage Link (via Railway Shell):**
```bash
# Buka Railway Console / Shell untuk project
php artisan storage:link
php artisan migrate --force
php artisan db:seed --force
```

**5. Setup Nixpacks (jika perlu auto-build):**
Buat file `nixpacks.toml` di root project:
```toml
[phases.setup]
nixPkgs = ["..."]
```

### Estimasi Biaya Railway:
| Tier | Harga | CPU | RAM | Storage |
|------|-------|-----|-----|---------|
| Starter | $5/bln | 1 vCPU | 512MB | 1GB |
| Developer | $10/bln | 1 vCPU | 1GB | 5GB |
| Pro | $20/bln | 2 vCPU | 2GB | 10GB |

> 💡 **Cukup pakai Starter $5/bulan** untuk API + Admin Panel SMKN 5 Bantaeng

---

## 2. 🆓 InfinityFree (Shared Hosting Gratis)

**Domain:** https://smkn5-bantaeng-admin.kesug.com/

> ⚠️ **CATATAN:** InfinityFree sudah diatur untuk hosting saat ini. Namun karena **tidak ada SSH**, banyak keterbatasan untuk Laravel.

### Kelebihan:
- ✅ **Gratis** — tidak ada biaya bulanan
- ✅ Support PHP 8.3
- ✅ MySQL database gratis
- ✅ SSL (HTTPS) otomatis
- ✅ Cocok untuk demo / staging / development

### Kekurangan:
- ❌ **Tidak ada SSH** → tidak bisa `php artisan` command
- ❌ **Limit 1MB per file upload** → vendor library harus dioptimasi
- ❌ Tidak bisa queue / job scheduling
- ❌ Performa shared hosting — lambat untuk traffic besar
- ❌ Setup manual via FTP (FileZilla)
- ❌ Storage terbatas

### Langkah Deployment:

### 1. Upload File via FTP

Gunakan **FileZilla** atau FTP client:
- **Host:** `ftpupload.net`
- **Username:** `if0_42497332`
- **Password:** `jhJETv1Pvb`
- **Port:** 21

Upload seluruh folder & file dari poin **Wajib** ke root folder hosting (biasanya `htdocs/` atau `/`).

### 📦 File & Folder yang Perlu Diupload

### Wajib (harus diupload):
```
├── .htaccess                  # ✅ Sudah dikonfigurasi untuk production
├── .env.production            # ⚠️ RENAME ke .env setelah isi credentials
├── artisan                    # Entry point Laravel
├── router.php                 # Fallback router (jika .htaccess bermasalah)
├── composer.json
├── composer.lock
├── package.json
├── vite.config.js
├── bootstrap/
│   └── app.php
├── config/                    # Semua file config
├── database/
│   └── migrations/            # Struktur tabel
├── public/                    # Front controller & assets
│   ├── .htaccess
│   ├── index.php
│   ├── build/                 # Hasil npm run build (assets)
│   ├── images/
│   └── css/ & js/             # Filament assets
├── resources/                 # Views, CSS, JS
│   └── views/
├── routes/                    # Route definitions
├── storage/                   # Upload & cache (kosongkan)
├── vendor/                    # Vendor library (upload hasil composer install)
└── app/                       # Source code aplikasi
```

### Tidak Perlu Diupload:
```
❌ node_modules/               # Hanya untuk development
❌ .env                        # File .env local (jangan upload!)
❌ .git/                       # Repository Git
❌ tests/                      # Unit test
❌ database.sql                # File export SQL (sudah diimport)
❌ export_db.php               # Script export (sudah dipakai)
❌ dataStatic/                 # Static data untuk development
```

### 2. Setup Database
1. Login ke **InfinityFree Control Panel** → **MySQL Databases**
2. Buat database baru (catat nama database, username, password)
3. Buka **phpMyAdmin**
4. Import file `database.sql` yang sudah disediakan

### 3. Konfigurasi .env
1. Copy `.env.production` → rename menjadi `.env`
2. Edit `.env` dengan credentials database InfinityFree:

```env
APP_NAME="SMKN 5 Bantaeng"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://smkn5-bantaeng-admin.kesug.com/

# 🔑 Generate APP_KEY (lihat langkah 4)
APP_KEY=

DB_CONNECTION=mysql
DB_HOST=sqlXXX.infinityfree.com      # Ganti dengan host MySQL InfinityFree
DB_PORT=3306
DB_DATABASE=if0_XXXXXXX_dbname       # Nama database
DB_USERNAME=if0_XXXXXXX              # Username database
DB_PASSWORD=your_db_password          # Password database

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
LOG_CHANNEL=daily
LOG_LEVEL=error
```

### 4. Generate APP_KEY
Karena InfinityFree **tidak mendukung SSH/Artisan**, lakukan ini:

**Opsi A - Generate lokal lalu copy:**
```bash
# Di local computer:
php artisan key:generate --show
# Output: base64:xxxxx...
# Copy key tersebut dan paste ke .env di hosting
```

**Opsi B - Via Browser (script):**
Akses `https://smkn5-bantaeng-admin.kesug.com/generate-key` (akan otomatis redirect setelah selesai)
Atau upload file `setup.php` berikut lalu hapus setelah selesai:

```php
<?php
// setup.php - HAPUS SETELAH DIPAKAI!
echo hash('sha256', bin2hex(random_bytes(32)));
```

### 5. Set Permission
Pastikan permission berikut di hosting:
- `storage/` → **755** (writable)
- `storage/framework/cache/` → **755**
- `storage/framework/sessions/` → **755**
- `storage/framework/views/` → **755**
- `storage/logs/` → **755**
- `bootstrap/cache/` → **755**

### 6. Generate Storage Link
Karena InfinityFree tidak support `php artisan storage:link`, buat folder:

1. Buat folder `public/storage` (jika belum ada)
2. Buat file `.htaccess` di `public/storage/` dengan:

```apache
Options +FollowSymLinks
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /storage/app/public/$1 [L]
```

### 7. Verifikasi
Akses: `https://smkn5-bantaeng-admin.kesug.com/`
- ✅ Harusnya muncul halaman welcome Laravel
- ✅ Akses `/admin` → Login page Filament
- ✅ Akses `/api/v1/departments` → JSON response

### ⚠️ Catatan Penting InfinityFree
1. **Tidak ada SSH** → Gunakan FITUR "Cron Job" di InfinityFree atau script PHP untuk task scheduling
2. **Tidak ada Artisan** → Semua perubahan env/config harus dilakukan manual
3. **SSL sudah otomatis** → URL sudah HTTPS
4. **Storage terbatas** → Hapus file `vendor.zip` setelah upload
5. **PHP max execution time 30s** → Untuk PPDB import data batch
6. **🚨 BATAS 1MB PER FILE** → Vendor sudah dioptimasi dengan `composer install --no-dev` agar `autoload_static.php` ≈ 960 KB (di bawah limit)
7. **Upload via FTP** bisa lambat untuk ribuan file di `vendor/`. Alternatif: zip vendor, upload zip, extract via File Manager hosting

---

## 3. ☁️ VPS (DigitalOcean / Linode / Vultr)

**Harga:** $6-12/bulan

VPS memberikan **full control** — Anda punya akses root, SSH, bisa install apa saja.

### Setup Manual:

```bash
# 1. SSH ke server
ssh root@your-server-ip

# 2. Install LEMP Stack
apt update && apt upgrade -y
apt install nginx mysql-server php8.3-fpm php8.3-mysql \
  php8.3-xml php8.3-mbstring php8.3-curl php8.3-zip \
  php8.3-bcmath php8.3-gd php8.3-intl composer git -y

# 3. Clone repository
cd /var/www
git clone https://github.com/username/smkn5-bantaeng.git
cd smkn5-bantaeng

# 4. Install dependencies
composer install --no-dev --optimize-autoloader

# 5. Setup environment
cp .env.example .env
php artisan key:generate
# Edit .env dengan database credentials

# 6. Setup database
mysql -u root -p
CREATE DATABASE smkn5_bantaeng;
EXIT;

# 7. Migrate & Seed
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link

# 8. Setup Nginx
cat > /etc/nginx/sites-available/smkn5 << 'EOF'
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/smkn5-bantaeng/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOF

ln -s /etc/nginx/sites-available/smkn5 /etc/nginx/sites-enabled/
nginx -t
systemctl reload nginx

# 9. Setup SSL (Let's Encrypt)
apt install certbot python3-certbot-nginx -y
certbot --nginx -d your-domain.com

# 10. Setup Queue Worker (Supervisor)
apt install supervisor -y
cat > /etc/supervisor/conf.d/laravel-worker.conf << 'EOF'
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/smkn5-bantaeng/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/smkn5-bantaeng/storage/logs/worker.log
stopwaitsecs=3600
EOF

supervisorctl reread
supervisorctl update
supervisorctl start laravel-worker:*
```

---

## 4. 🐳 Laravel Forge + VPS

**Harga:** Forge $12/bulan + VPS $6-12/bulan

Laravel Forge adalah **server management tool** yang otomatis setup VPS untuk Laravel.

### Langkah:

```bash
# 1. Daftar Laravel Forge (https://forge.laravel.com)
# 2. Hubungkan akun DigitalOcean / Linode / AWS
# 3. Create server (pilih PHP 8.3, MySQL, queue worker)
# 4. Connect GitHub repository
# 5. Forge otomatis:
#    - Install Nginx + PHP + MySQL
#    - Clone repository
#    - Setup .env
#    - Setup SSL (Let's Encrypt)
#    - Setup queue worker (Supervisor)
#    - Setup cron job (schedule:run)
#    - Deployment script
# 6. Setup deployment:
```

**Deployment Script di Forge:**
```bash
cd /home/forge/your-domain.com
git pull origin main
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

---

## 5. 🌐 Hosting Berbayar Indonesia (Niagahoster / DomaiNesia)

**Harga:** ~Rp 20.000-50.000/bulan

### Provider yang Support Laravel:
| Provider | Harga Mulai | PHP 8.3 | SSH | Fitur |
|----------|-------------|---------|-----|-------|
| **Niagahoster** | Rp 24.900/bln | ✅ | ❌ | cPanel, Softaculous |
| **DomaiNesia** | Rp 18.000/bln | ✅ | ✅ (terbatas) | cPanel |
| **JagoHosting** | Rp 15.000/bln | ✅ | ❌ | cPanel |
| **Dewaweb** | Rp 35.000/bln | ✅ | ✅ | cPanel + Blazing Fast |

### Langkah:
```bash
# 1. Login cPanel hosting
# 2. Buat database & user MySQL
# 3. Upload file via File Manager cPanel atau FTP
# 4. Import database.sql via phpMyAdmin
# 5. Setup .env (sama seperti langkah InfinityFree)
# 6. Jika ada SSH:
ssh user@hosting
cd public_html
php artisan migrate --force
php artisan storage:link
```

---

## 6. 📦 Persiapan Awal (Wajib untuk Semua Platform)

### Build Assets (Filament)
```bash
# Sebelum deploy, build assets Filament
npm install
npm run build

# Optimasi vendor (untuk shared hosting dengan limit file)
composer install --no-dev --optimize-autoloader
```

### File .env.production
File `.env.production` sudah disediakan sebagai template. Copy dan rename jadi `.env` setelah diisi credentials.

### Generate APP_KEY
```bash
php artisan key:generate --show
# Copy output key untuk ditempel di .env
```

---

## 7. 🔐 Login Admin

- **Email:** `admin@smkn5bantaeng.sch.id`
- **Password:** `password`

⚠️ **Segera ganti password setelah pertama login!**

---

## 📞 Kontak Developer

Jika ada kendala dalam deployment, hubungi developer.

