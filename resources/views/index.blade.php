<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PustakaNusa - Kelola Produk & Katalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen">

    <!-- Top Navigation Bar -->
    <header class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md shadow-indigo-200">
                    PN
                </div>
                <div>
                    <span class="font-bold text-slate-900 text-lg tracking-tight">PustakaNusa</span>
                    <span class="text-xs text-indigo-600 font-medium bg-indigo-50 px-2 py-0.5 rounded-full ml-2 border border-indigo-100">Modern Lib</span>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('create') }}" class="inline-flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm px-4 py-2 rounded-xl transition-all shadow-sm hover:shadow-indigo-100 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Tambah Koleksi</span>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Summary Section -->
        <div class="mb-8 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 rounded-2xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-indigo-500/10 rounded-full blur-2xl"></div>
            <div class="relative z-10 max-w-2xl">
                <span class="inline-block text-xs uppercase tracking-wider text-indigo-300 font-semibold mb-2">Dashboard Katalog</span>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Kelola Data Produk & Buku Perpustakaan</h1>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Sistem inventaris koleksi modern. Kelola penambahan, pembaruan harga, hingga penghapusan katalog dengan cepat dan presisi.
                </p>
            </div>
        </div>

        <!-- Alert Notification -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200/80 text-emerald-800 px-4 py-3.5 rounded-xl flex items-center justify-between shadow-sm animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-emerald-500/10 rounded-lg flex items-center justify-center text-emerald-600 font-bold">✓</div>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Filter & Search Bar -->
        <div class="bg-white p-4 rounded-xl border border-slate-200/80 shadow-sm mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="relative w-full md:w-96">
                <svg class="w-5 h-5 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari nama produk atau deskripsi..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition">
            </div>
            <div class="text-xs text-slate-500 font-medium">
                Total Koleksi: <span class="font-bold text-slate-800">{{ $produk->count() }} Item</span>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse" id="produkTable">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200/80 text-slate-500 uppercase text-[11px] font-bold tracking-wider">
                            <th class="py-4 px-6">No</th>
                            <th class="py-4 px-6">Nama Produk / Buku</th>
                            <th class="py-4 px-6">Estimasi Harga / Nilai</th>
                            <th class="py-4 px-6">Deskripsi</th>
                            <th class="py-4 px-6 text-right">Aksi Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($produk as $key => $item)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-4 px-6 font-semibold text-slate-400 text-xs">{{ $key + 1 }}</td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-9 h-9 bg-indigo-50 border border-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 font-bold text-xs">
                                            {{ strtoupper(substr($item->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <span class="font-bold text-slate-900 block">{{ $item->name }}</span>
                                            <span class="text-[11px] text-slate-400 font-mono">ID: #PRD-{{ $item->id }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-slate-100 text-slate-800 font-mono text-xs font-semibold">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-slate-500 text-xs max-w-xs leading-relaxed">
                                    {{ $item->description ?? 'Tidak ada deskripsi' }}
                                </td>
                                <td class="py-4 px-6 text-right space-x-1">
                                    <a href="{{ route('edit', $item->id) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-amber-700 bg-amber-50 hover:bg-amber-100 border border-amber-200/80 rounded-lg transition-all">
                                        Edit
                                    </a>
                                    <form action="{{ route('destroy', $item->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200/80 rounded-lg transition-all">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-16 text-center text-slate-400">
                                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-400 font-bold text-xl">!</div>
                                    <p class="text-base font-semibold text-slate-700">Belum ada produk di database</p>
                                    <p class="text-xs text-slate-400 mt-1">Tambahkan koleksi baru menggunakan tombol di atas.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#produkTable tbody tr");
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
</body>
</html>