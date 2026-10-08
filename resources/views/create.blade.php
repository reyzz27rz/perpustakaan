<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru - PustakaNusa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen py-10">

    <div class="max-w-xl mx-auto px-4">
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 inline-flex items-center space-x-1">
                <span>&larr; Kembali ke Katalog</span>
            </a>
            <span class="text-xs text-slate-400 font-mono">Form Entri Data</span>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-lg p-6 md:p-8">
            <div class="border-b border-slate-100 pb-4 mb-6">
                <h1 class="text-xl font-bold text-slate-900">Tambah Koleksi Produk</h1>
                <p class="text-xs text-slate-500 mt-1">Masukkan rincian informasi untuk menambahkan produk baru.</p>
            </div>

            <form action="{{ route('store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Nama Produk <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition outline-none" placeholder="Masukkan nama produk/buku">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Harga / Nilai (Rp) <span class="text-rose-500">*</span></label>
                    <input type="number" name="price" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition outline-none" placeholder="Contoh: 75000">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Deskripsi Ringkas</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition outline-none" placeholder="Tuliskan gambaran singkat produk..."></textarea>
                </div>

                <div class="pt-4 flex items-center justify-end space-x-3 border-t border-slate-100">
                    <a href="{{ route('index') }}" class="px-4 py-2.5 text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md shadow-indigo-100 transition active:scale-95">
                        Simpan ke Katalog
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>