# 🚀 Deploy Backend Laravel ke Render (Free Tier) + Neon PostgreSQL

> Backend **Laravel 13 + Filament 5** (API + Admin Panel) untuk Portal SMKN 5 Bantaeng.
> Frontend **Next.js** sudah berjalan di **Vercel**.
>
> **Arsitektur:**
> - ✅ **Render** (free tier) → menjalankan backend Laravel
> - ✅ **Neon** (free tier) → database PostgreSQL (persisten, gratis)
> - ✅ **Vercel** → frontend Next.js (sudah ada)

---

## 📋 Ringkasan Arsitektur

```
┌─────────────┐     HTTPS      ┌──────────────────────┐
│  Vercel     │ ─────────────> │  Render (Laravel API) │
│  Next.js    │                │  https://xxx.onrender.com │
│  Frontend   │                └──────────┬───────────┘
└─────────────┘                           │
                                          │ PostgreSQL (SSL)
                                     ┌────▼────┐
                                     │  Neon   │  (gratis, persisten)
                                     └─────────┘
```

> **Kenapa Neon?** Render free tier **tidak** menyediakan database managed.
> Neon memberikan PostgreSQL gratis dengan data persisten (tidak hilang saat Render restart/redeploy).

---

## ✅ Prasyarat

1. Akun **GitHub** (untuk repo backend)
2. Akun **Render** (login via GitHub): https://render.com
3. Akun **Neon**: https://neon.tech (sign up gratis)
4. Akun **Vercel** dengan frontend Next.js (sudah ada)

---

## 📦 File Konfigurasi di Repo Ini

| File | Fungsi |
|------|--------|
| `render.yaml` | Blueprint opsional Render (bisa dipakai via "New Blueprint") |
| `nixpacks.toml` | Konfigurasi build Nixpacks (PHP 8.3 + pdo_pgsql + composer) |
| `.env.render` | Template environment variables (untuk diisi di Render) |
| `config/cors.php` | CORS setup — izinkan frontend Vercel memanggil API |
| `bootstrap/app.php` | Trust proxies (untuk https Render) |

---

## 🗄️ Langkah 1: Setup Database Neon (PostgreSQL Gratis)

1. Buka https://neon.tech → **Sign up** (bisa pakai GitHub/Google)
2. Buat **New Project** → beri nama (mis. `smkn5-bantaeng`)
3. Pilih region (pilih yang dekat, mis. `Singapore`)
4. Setelah project dibuat, buka tab **Connection Details**
5. Salin **connection string** (format psql):
   ```
   postgresql://user:password@ep-xxx-xxx.aws-neon.tech/smkn5?sslmode=require
   ```
   - `user` = username
   - `password` = password database
   - `host` = `ep-xxx-xxx.aws-neon.tech`
   - `database` = `smkn5` (default `neondb`)
6. Simpan detail ini — akan dipakai di langkah 3.

> 💡 Catat `DB_HOST`, `DB_PORT=5432`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

---

## 🐙 Langkah 2: Push ke GitHub

```bash
# (Jika belum) dari folder project
git add .
git commit -m "Prepare Render deployment"
git branch -M main
git remote add origin https://github.com/USERNAME/REPO-NAME.git
git push -u origin main
```

> Render akan deploy dari repo GitHub ini.

---

## 🚀 Langkah 3: Buat Web Service di Render

### Cara A (Rekomendasi — pakai Blueprint)
1. Login https://render.com (via GitHub)
2. **New** → **Blueprint**
3. Pilih repo ini → Render akan baca `render.yaml`
4. Ini akan membuat service + daftar env yang perlu diisi

### Cara B (Manual — pakai Web Service)
1. Login https://render.com
2. **New** → **Web Service**
3. Hubungkan repo GitHub ini
4. Render akan auto-detect Laravel (Nixpacks, pakai `nixpacks.toml`)
5. Isi:
   - **Name:** `smkn5-bantaeng-api`
   - **Runtime:** `PHP`
   - **Build Command:**
     ```bash
     composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
     ```
   - **Start Command:**
     ```bash
     php artisan serve --host=0.0.0.0 --port=$PORT
     ```
   - **Plan:** `Free`
6. Klik **Create Web Service**

---

## ⚙️ Langkah 4: Set Environment Variables di Render

Di service → **Environment** tab, set:

```env
APP_NAME="SMKN 5 Bantaeng"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxx   # generate: php artisan key:generate --show

# URL yang diberikan Render (setelah service dibuat)
APP_URL=https://smkn5-bantaeng-api.onrender.com

# Origin frontend Vercel Anda (untuk CORS)
# Ganti dengan URL Vercel asli Anda
FRONTEND_URL=https://smkn5-bantaeng.vercel.app

# ── Database Neon ──
DB_CONNECTION=pgsql
DB_HOST=ep-xxx-xxx.aws-neon.tech
DB_PORT=5432
DB_DATABASE=smkn5
DB_USERNAME=your-user
DB_PASSWORD=your-password
DB_SSLMODE=require

# ── Session / Cache (file, aman untuk free tier) ──
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
LOG_CHANNEL=stderr
FILESYSTEM_DISK=local
```

> **Generate APP_KEY:**
> ```bash
> php artisan key:generate --show
> ```

---

## 🛠️ Langkah 5: Jalankan Migrate & Seed (pertama kali)

Render free tier menggunakan **file system sementara**. Jadi jalankan ini **setiap kali selesai deploy** (atau sekaligus sekali jika tidak upload file).

1. Di Render service → tab **Shell**
2. Jalankan:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   php artisan storage:link
   php artisan config:clear
   ```

> ⚠️ **PENTING:** Karena disk Render free tier **efemeral** (hilang saat restart/redeploy), jalankan `storage:link` ulang setelah setiap deploy. Data database **tetap aman** di Neon (persisten).

> 💡 Untuk otomasi, Anda bisa menambahkan `render.yaml` dengan `preDeployCommand` (tidak tersedia di free) atau mengubah start command untuk menjalankan migrate otomatis:
> ```
> php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
> ```

---

## ✅ Langkah 6: Verifikasi

1. **Health check:** buka `https://smkn5-bantaeng-api.onrender.com/up` → harus tampil `{"message":"OK"}`
2. **API test:** buka `https://smkn5-bantaeng-api.onrender.com/api/v1/departments` → JSON daftar jurusan
3. **Admin panel:** buka `https://smkn5-bantaeng-api.onrender.com/admin` → login page Filament
4. **Login admin:** `admin@smkn5bantaeng.sch.id` / `password`

---

## 🔗 Langkah 7: Hubungkan Frontend Vercel

1. Buka project Next.js di Vercel
2. Set environment variable API URL di Vercel → **Environment Variables**:
   ```
   NEXT_PUBLIC_API_URL=https://smkn5-bantaeng-api.onrender.com/api/v1
   ```
3. Pastikan kode frontend memakai `NEXT_PUBLIC_API_URL` ini
4. Redeploy di Vercel

> CORS sudah diatur di `config/cors.php` — origin frontend (FRONTEND_URL) diizinkan.

---

## ⚠️ Keterbatasan Render Free Tier

| Keterbatasan | Dampak | Solusi |
|-------------|--------|--------|
| **Disk efemeral** | Upload file hilang saat restart | Simpan file di storage cloud (S3/Cloudinary) |
| **Instance tidur** saat idle 15 menit | Request pertama lambat (cold start) | Terima saja untuk free |
| **512MB RAM** | Kurang untuk traffic besar | Upgrade bila perlu |
| **750 jam/bulan** | Cukup untuk 1 web service always-on | Gunakan 1 service saja |
| **Tanpa DB managed gratis** | Perlu DB eksternal | Pakai **Neon** (gratis) |

---

## 🔄 Redeploy / Update

```bash
git add .
git commit -m "Update"
git push origin main
```
Render otomatis rebuild & deploy ulang dari branch `main`.

Setelah deploy selesai, jalankan di **Render Shell**:
```bash
php artisan migrate --force
php artisan storage:link
```

---

## 📞 Login Admin

- **Email:** `admin@smkn5bantaeng.sch.id`
- **Password:** `password`

⚠️ **Segera ganti password setelah login pertama.**

---

## 🧯 Troubleshooting

| Masalah | Solusi |
|---------|--------|
| `Connection refused` ke DB | Pastikan `DB_SSLMODE=require` & host benar (dari Neon) |
| Error SQL `array` | Pastikan `DB_CONNECTION=pgsql` (bukan mysql) |
| 500 error setelah deploy | Cek logs di Render → **Logs** tab |
| CORS/403 saat frontend panggil API | Pastikan `FRONTEND_URL` = URL Vercel persis (tanpa trailing slash) |
| Admin login gagal | Jalankan ulang `php artisan db:seed --force` |
| `storage:link` hilang | Jalankan ulang `php artisan storage:link` di Shell |
