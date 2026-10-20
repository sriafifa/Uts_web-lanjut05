
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMPEG')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 28px 18px;
            background: #172554;
            color: white;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            margin: 0 0 35px;
        }

        .nav-link {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 9px;
            color: #dbeafe;
            text-decoration: none;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #2563eb;
            color: white;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 22px 32px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .topbar h1 {
            margin: 0;
            font-size: 23px;
        }

        .user-info {
            color: #64748b;
            font-size: 14px;
        }

        .content {
            padding: 30px 32px;
        }

        .panel {
            padding: 24px;
            margin-bottom: 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: 0;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        @media (max-width: 760px) {
            .sidebar {
                position: static;
                width: 100%;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 20px;
                align-items: flex-start;
                flex-direction: column;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">SIMPEG</div>

        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('employees.index') }}"
           class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
            Data Pegawai
        </a>

        <a href="{{ route('departments.index') }}"
           class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
            Data Departemen
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="nav-link"
                style="width:100%; text-align:left; border:0; cursor:pointer;">
                Logout
            </button>
        </form>
    </aside>

    <div class="main">
        <header class="topbar">
            <h1>@yield('heading', 'Dashboard')</h1>

            <div class="user-info">
                {{ auth()->user()->name ?? 'Pengguna' }}
            </div>
        </header>

        <main class="content">
            @yield('content')
        </main>
    </div>

</body>
</html>
