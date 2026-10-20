<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Fady'))</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #1e293b;
            background: #f8fafc;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            background:
                radial-gradient(ellipse at 12% 0%, rgba(196, 181, 253, 0.36), transparent 34rem),
                linear-gradient(135deg, #f8fafc 0%, #f5f3ff 50%, #eef2ff 100%);
        }

        a {
            color: inherit;
        }

        .site-header {
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(16px);
        }

        .nav-wrap {
            display: flex;
            width: min(1120px, calc(100% - 48px));
            min-height: 76px;
            margin: 0 auto;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            color: #312e81;
            font-size: 17px;
            font-weight: 750;
            letter-spacing: -0.04em;
            text-decoration: none;
        }

        .brand-mark {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 12px;
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            box-shadow: 0 6px 14px rgba(99, 102, 241, 0.22);
            color: #fff;
            font-size: 15px;
            font-weight: 800;
        }

        .site-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            padding: 10px 14px;
            border-radius: 10px;
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: color 150ms ease, background 150ms ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #f1efff;
            color: #5b21b6;
        }

        .page-shell {
            width: min(960px, calc(100% - 48px));
            margin: 0 auto;
            padding: 54px 0 72px;
        }

        .page-heading {
            display: flex;
            margin-bottom: 26px;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
        }

        .eyebrow {
            margin: 0 0 9px;
            color: #7c3aed;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 0.19em;
            text-transform: uppercase;
        }

        h1,
        h2,
        p {
            margin-top: 0;
        }

        h1 {
            margin-bottom: 8px;
            color: #1e1b4b;
            font-size: clamp(28px, 4vw, 38px);
            letter-spacing: -0.055em;
            line-height: 1.15;
        }

        h2 {
            margin-bottom: 10px;
            color: #1e1b4b;
            font-size: 21px;
            letter-spacing: -0.035em;
        }

        .page-description {
            max-width: 590px;
            margin-bottom: 0;
            color: #64748b;
            font-size: 15px;
            line-height: 1.7;
        }

        .panel {
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 20px 60px rgba(49, 46, 129, 0.09);
        }

        .panel-body {
            padding: 30px;
        }

        .button {
            display: inline-flex;
            min-height: 44px;
            padding: 11px 17px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            border-radius: 11px;
            background: linear-gradient(115deg, #6d28d9, #4f46e5);
            box-shadow: 0 8px 18px rgba(99, 102, 241, 0.2);
            color: #fff;
            cursor: pointer;
            font: inherit;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 150ms ease, box-shadow 150ms ease;
        }

        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 11px 22px rgba(99, 102, 241, 0.28);
        }

        .button-secondary {
            border: 1px solid #e2e8f0;
            background: #fff;
            box-shadow: none;
            color: #475569;
        }

        .button-secondary:hover {
            background: #f8fafc;
            box-shadow: none;
        }

        .form-stack {
            display: grid;
            gap: 21px;
        }

        .field-label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 650;
        }

        .field-input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            outline: none;
            background: #f8fafc;
            color: #1e293b;
            font: inherit;
            transition: border-color 160ms ease, box-shadow 160ms ease, background 160ms ease;
        }

        .field-input::placeholder {
            color: #94a3b8;
        }

        .field-input:focus {
            border-color: #8b5cf6;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.14);
        }

        .field-error {
            display: block;
            margin-top: 7px;
            color: #dc2626;
            font-size: 13px;
        }

        .user-summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-top: 22px;
        }

        .hero-panel {
            position: relative;
            overflow: hidden;
            padding: clamp(30px, 6vw, 64px);
            background:
                radial-gradient(circle at 88% 10%, rgba(196, 181, 253, 0.4), transparent 17rem),
                rgba(255, 255, 255, 0.92);
        }

        .hero-panel h1 {
            max-width: 650px;
            font-size: clamp(38px, 7vw, 62px);
        }

        .hero-panel .page-description {
            max-width: 560px;
            font-size: 17px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .feature-card {
            padding: 22px;
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.78);
            box-shadow: 0 12px 30px rgba(49, 46, 129, 0.05);
        }

        .feature-number {
            display: grid;
            width: 34px;
            height: 34px;
            margin-bottom: 18px;
            place-items: center;
            border-radius: 11px;
            background: #f1efff;
            color: #6d28d9;
            font-size: 13px;
            font-weight: 800;
        }

        .feature-card h2 {
            font-size: 16px;
        }

        .feature-card p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.65;
        }

        .summary-item {
            padding: 18px;
            border: 1px solid #ede9fe;
            border-radius: 14px;
            background: #faf9ff;
        }

        .summary-label {
            display: block;
            margin-bottom: 7px;
            color: #7c8498;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .summary-value {
            color: #312e81;
            font-size: 17px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .site-footer {
            padding: 0 24px 26px;
            color: #94a3b8;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .nav-wrap {
                width: min(100% - 32px, 1120px);
                min-height: 68px;
                gap: 12px;
            }

            .brand {
                gap: 8px;
                font-size: 15px;
            }

            .brand-mark {
                width: 34px;
                height: 34px;
            }

            .site-nav {
                gap: 2px;
            }

            .nav-link {
                padding: 9px 10px;
                font-size: 13px;
            }

            .page-shell {
                width: min(100% - 32px, 960px);
                padding: 38px 0 52px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .panel-body {
                padding: 22px;
            }

            .user-summary {
                grid-template-columns: 1fr;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="site-header">
        <div class="nav-wrap">
            <a class="brand" href="{{ url('/') }}">
                <span class="brand-mark" aria-hidden="true">P</span>
                <span>Fady Project</span>
            </a>
            <nav class="site-nav" aria-label="Main navigation">
                <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">Users</a>
                <a class="nav-link {{ request()->routeIs('user.create') ? 'active' : '' }}" href="{{ route('user.create') }}">Add user</a>
                <a class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}" href="{{ route('posts.index') }}">Posts</a>
            </nav>
        </div>
    </header>

    <main class="page-shell">

        @session("success")
        <div class="eyebrow">
            {{ session("success") }}
        </div>
        @endsession

        @yield('content')
    </main>

    <footer class="site-footer">A simple space to manage your people.</footer>
</body>
</html>
