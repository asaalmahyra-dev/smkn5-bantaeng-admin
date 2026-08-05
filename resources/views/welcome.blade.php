<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Negeri 5 Bantaeng</title>
    <link rel="icon" href="{{ asset('images/logo-smkn5-bantaeng.png') }}" sizes="any" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-smkn5-bantaeng.png') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 50%, #14b8a6 100%);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 2rem;
            padding: 3rem;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            text-align: center;
        }
        .logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1.5rem;
            border-radius: 1rem;
        }
        h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #0f766e;
            margin-bottom: 0.25rem;
            line-height: 1.2;
        }
        .subtitle {
            font-size: 1rem;
            color: #64748b;
            margin-bottom: 2rem;
            font-weight: 500;
        }
        .tagline {
            font-size: 1.125rem;
            color: #475569;
            margin-bottom: 2.5rem;
            line-height: 1.6;
            margin-left: auto;
            margin-right: auto;
        }
        .links {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }
        .btn-primary {
            background: #0f766e;
            color: white;
        }
        .btn-primary:hover {
            background: #115e59;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(15, 118, 110, 0.3);
        }
        .btn-ghost {
            background: #f1f5f9;
            color: #475569;
            border-color: transparent;
        }
        .btn-ghost:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }
        .footer {
            font-size: 0.8rem;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 1.5rem;
        }
        .footer a {
            color: #0f766e;
            text-decoration: none;
            font-weight: 600;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 640px) {
            body { padding: 1rem; }
            .card { padding: 2rem 1.5rem; border-radius: 1.5rem; }
            h1 { font-size: 1.5rem; }
            .links { flex-direction: column; align-items: stretch; }
            .btn { justify-content: center; }
        }
    </style>
</head>
<body>
    <div class="card">
        <img src="{{ asset('images/logo-smkn5-bantaeng.png') }}" alt="SMKN 5 Bantaeng" class="logo" onerror="this.style.display='none'">

        <h1>SMK Negeri 5 Bantaeng</h1>
        <p class="subtitle">Unggul, Berkarakter, Berdaya Saing</p>

        <p class="tagline">
            Selamat datang di portal manajemen <strong>SMK Negeri 5 Bantaeng</strong>.
            Sistem ini digunakan untuk mengelola konten website sekolah — mulai dari program keahlian, guru, fasilitas, berita, prestasi, hingga galeri.
        </p>

        <div class="links">
            <a href="/admin" class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Panel Admin
            </a>
            <a href="/admin/login" class="btn btn-ghost">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Login
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} <a href="https://smkn5bantaeng.sch.id">SMK Negeri 5 Bantaeng</a>
            &middot; Powered by Laravel
        </div>
    </div>
</body>
</html>

