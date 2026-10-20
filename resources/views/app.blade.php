
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SIMPEG')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f5f7fb;
            color: #182230;
        }
        a { color: inherit; text-decoration: none; }
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 28px 18px;
            background: #fff;
            border-right: 1px solid #e8edf3;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 32px;
            font-size: 19px;
            font-weight: 800;
        }
        .brand-icon {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 13px;
            color: #fff;
            background: #2563eb;
        }
        .nav-label {
            margin: 10px 10px 12px;
            color: #98a2b3;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 11px;
            color: #667085;
            font-size: 13px;
            font-weight: 600;
        }
        .nav-link:hover, .nav-link.active {
            background: #edf4ff;
            color: #2563eb;
        }
        .main {
            min-height: 100vh;
            margin-left: 250px;
        }
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 22px 34px;
            background: #fff;
            border-bottom: 1px solid #e8edf3;
        }
        .topbar h1 {
            margin: 0;
            font-size: 21px;
            font-weight: 800;
        }
        .topbar small {
            display: block;
            margin-top: 5px;
            color: #98a2b3;
            font-size: 11px;
        }
        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            font-weight: 700;
        }
        .avatar {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            font-weight: 800;
        }
        .page-content { padding: 30px 34px; }
        .panel {
            padding: 24px;
            margin-bottom: 24px;
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(16, 24, 40, .025);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 15px;
            border: 0;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn:hover { background: #1d4ed8; }
        .btn-secondary {
            background: #eef2f6;
            color: #344054;
        }
        .btn-danger { background: #dc2626; }
        .form-control, input, select, textarea {
            max-width: 100%;
            font-family: inherit;
        }
        .form-control, .page-content input,
        .page-content select, .page-content textarea {
            padding: 11px 13px;
            border: 1px solid #d0d5dd;
            border-radius: 9px;
            background: white;
        }
        .page-content table {
            width: 100%;
            border-collapse: collapse;
        }
        .page-content th {
            padding: 13px;
            background: #f8fafc;
            color: #667085;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .page-content td {
            padding: 15px 13px;
            border-bottom: 1px solid #eef1f5;
            font-size: 12px;
        }
        .alert {
            padding: 14px 17px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 13px;
        }
        .alert-success { background: #ecfdf3; color: #027a48; }
        .alert-error { background: #fef3f2; color: #b42318; }
        @media (max-width: 800px) {
            .sidebar { position: static; width: 100%; }
            .main { margin-left: 0; }
            .topbar { padding: 20px; }
            .page-content { padding: 20px; overflow-x: auto; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="brand">
            <span class="brand-icon">S</span>
            <span>SIMPEG<small style="display:block;color:#98a2b3;font-size:10px;font-weight:500;margin-top:3px">Sistem Kepegawaian</small></span>
        </a>

        <div class="nav-label">MENU UTAMA</div>

        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            ◫ &nbsp; Dashboard
        </a>

        <a href="{{ route('employees.index') }}"
           class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
            ♙ &nbsp; Data Pegawai
        </a>

        <a href="{{ route('departments.index') }}"
           class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
            ▦ &nbsp; Departemen
        </a>

        <div style="position:absolute;bottom:24px;left:18px;right:18px;border-top:1px solid #eef1f5;padding-top:18px">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link" style="width:100%;border:0;background:transparent;cursor:pointer;text-align:left">
                    ↪ &nbsp; Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <div>
                <h1>@yield('heading', 'Dashboard')</h1>
                <small>Selamat datang di Sistem Informasi Kepegawaian</small>
            </div>
            <div class="user-chip">
                <span class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                <span>{{ auth()->user()->name ?? 'Administrator' }}</span>
            </div>
        </header>

        <main class="page-content">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data yang dimasukkan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
