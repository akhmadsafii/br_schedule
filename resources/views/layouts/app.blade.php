<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Konsep Sistem Jadwal')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet" />
    <style>
        :root {
            --bg: #0f1720;
            --bg-alt: #101a24;
            --card: #151f2a;
            --ink: #e6edf3;
            --muted: #b6c2cc;
            --accent: #ff8a3d;
            --accent-2: #2dd4bf;
            --stroke: #243243;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Space Grotesk", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(1200px 600px at 10% -10%, rgba(45, 212, 191, 0.2), transparent 60%),
                radial-gradient(1000px 500px at 90% -20%, rgba(255, 138, 61, 0.18), transparent 60%),
                linear-gradient(180deg, var(--bg), #0c1218 60%, var(--bg-alt));
            min-height: 100vh;
        }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 56px 24px 80px;
        }

        header {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            gap: 32px;
            align-items: center;
            margin-bottom: 48px;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 0.18em;
            font-size: 12px;
            color: var(--muted);
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: clamp(32px, 4vw, 48px);
            margin: 12px 0 16px;
        }

        .lead {
            color: var(--muted);
            font-size: 18px;
            line-height: 1.6;
            max-width: 640px;
        }

        .status {
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 20px;
            padding: 20px 24px;
            display: grid;
            gap: 8px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            animation: floatIn 700ms ease-out;
        }

        .status strong {
            color: var(--accent-2);
        }

        .grid {
            display: grid;
            gap: 20px;
        }

        .grid.two {
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .grid.three {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        section {
            margin-bottom: 36px;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title span {
            width: 36px;
            height: 2px;
            background: linear-gradient(90deg, var(--accent), transparent);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 18px;
            padding: 20px;
            display: grid;
            gap: 12px;
            min-height: 150px;
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
        }

        .card ul {
            margin: 0;
            padding-left: 18px;
            color: var(--muted);
            line-height: 1.6;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(255, 138, 61, 0.15);
            color: var(--accent);
            font-size: 12px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .code {
            background: #0b1118;
            border: 1px dashed #2b3a4a;
            border-radius: 14px;
            padding: 16px;
            font-family: "Courier New", monospace;
            font-size: 13px;
            color: #d6e1ea;
            overflow-x: auto;
        }

        .taglist {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag {
            border: 1px solid var(--stroke);
            padding: 8px 12px;
            border-radius: 10px;
            color: var(--muted);
            background: rgba(21, 31, 42, 0.6);
        }

        .schedule-wrap {
            background: #0b1118;
            border: 1px solid var(--stroke);
            border-radius: 18px;
            overflow: hidden;
        }

        .schedule-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid var(--stroke);
            background: rgba(15, 23, 32, 0.8);
        }

        .schedule-title {
            font-weight: 600;
        }

        .schedule-badge {
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid var(--stroke);
            color: var(--muted);
        }

        .schedule-badge.final {
            border-color: rgba(255, 138, 61, 0.6);
            color: var(--accent);
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .schedule-table th,
        .schedule-table td {
            border: 1px solid #1f2b3a;
            padding: 8px;
            text-align: center;
            min-width: 38px;
        }

        .schedule-table th {
            background: #111a24;
            color: var(--muted);
            font-weight: 500;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .schedule-table td.name {
            text-align: left;
            font-weight: 600;
            min-width: 160px;
            background: #111a24;
            position: sticky;
            left: 0;
            z-index: 1;
        }

        .shift-select {
            width: 100%;
            background: #0f1720;
            border: 1px solid #283648;
            color: var(--ink);
            border-radius: 8px;
            padding: 6px 8px;
            font-size: 12px;
        }

        .shift-select:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .shift-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            border: 1px solid #253446;
        }

        .schedule-footer {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 20px;
            border-top: 1px solid var(--stroke);
            background: rgba(15, 23, 32, 0.8);
        }

        @keyframes floatIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 900px) {
            header {
                grid-template-columns: 1fr;
            }

            .schedule-table th,
            .schedule-table td {
                min-width: 32px;
                padding: 6px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="page">
        @yield('content')
    </div>
</body>
</html>
