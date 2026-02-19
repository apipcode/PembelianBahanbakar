<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pembelian Bahan Bakar')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 600: '#2563eb', 700: '#1d4ed8' },
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 min-h-screen">
    <nav class="bg-slate-800 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14">
                <div class="flex items-center">
                    <a href="{{ route('transactions.index') }}" class="text-lg font-semibold text-white hover:text-slate-200 transition">
                        ⛽ Pembelian Bahan Bakar
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('transactions.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('transactions.index') ? 'bg-slate-700 text-white' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
                        Daftar Transaksi
                    </a>
                    <a href="{{ route('transactions.create') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:bg-slate-700 hover:text-white">
                        Tambah Transaksi
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-800 px-4 py-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
