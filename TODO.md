# TODO - Deploy Backend Laravel ke Render (Free Tier)

## Tujuan
Backend Laravel (API + Admin Panel Filament) untuk SMKN 5 Bantaeng,
di-deploy ke **Render Free Tier** dengan database **PostgreSQL via Neon** (gratis).
Frontend Next.js sudah berjalan di Vercel.

## Langkah

### 1. Persiapan File Konfigurasi Deploy
- [x] Buat `render.yaml` (blueprint service Render)
- [x] Buat `nixpacks.toml` (konfigurasi build Nixpacks)
- [x] Buat `.env.render` (template environment variables)
- [x] Buat `config/cors.php` (izar fallback, atur origin frontend Vercel)
- [x] Update CORS di `bootstrap/app.php` (bila perlu)

### 2. Setup Git & Commit
- [ ] `git init` (jika belum)
- [ ] Buat branch `blackboxai/render-deploy`
- [ ] Commit file konfigurasi

### 3. Setup Database Neon (manual - butuh akun)
- [ ] Daftar neon.tech (gratis)
- [ ] Buat project & database PostgreSQL
- [ ] Catat connection string (DATABASE_URL)

### 4. Deploy ke Render (manual - butuh akun)
- [ ] Daftar render.com (login via GitHub)
- [ ] Buat Web Service dari repo GitHub
- [ ] Set env variables (APP_KEY, DATABASE_URL, dll)
- [ ] Jalankan migrate + seed via Render Shell
- [ ] Verifikasi URL API & admin panel

### 5. Verifikasi Koneksi Frontend Vercel
- [ ] Update API URL di frontend Next.js (Vercel)
- [ ] Test endpoint `/api/v1/departments`
- [ ] Test admin login `/admin`
