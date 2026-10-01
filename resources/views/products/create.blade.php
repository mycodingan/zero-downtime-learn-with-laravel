@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header Page -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Produk Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini untuk menambahkan data produk.</p>
        </div>
        <a href="{{ route('products.index') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sm:p-8">
        <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nama Produk -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Produk <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    placeholder="Contoh: Laptop Asus Zenbook"
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('name') ? 'border-rose-300 focus:ring-rose-500 focus:border-rose-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:outline-none focus:ring-2 transition text-sm">
                @error('name')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Harga Produk -->
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">
                        Harga (Rp) <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required
                        placeholder="Contoh: 15000000"
                        class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('price') ? 'border-rose-300 focus:ring-rose-500 focus:border-rose-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:outline-none focus:ring-2 transition text-sm">
                    @error('price')
                        <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok Produk -->
                <div>
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">
                        Jumlah Stok <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" required
                        placeholder="Contoh: 25"
                        class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('stock') ? 'border-rose-300 focus:ring-rose-500 focus:border-rose-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:outline-none focus:ring-2 transition text-sm">
                    @error('stock')
                        <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Deskripsi Produk -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">
                    Deskripsi Produk (Opsional)
                </label>
                <textarea name="description" id="description" rows="4"
                    placeholder="Tuliskan spesifikasi atau keterangan singkat produk..."
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('description') ? 'border-rose-300 focus:ring-rose-500 focus:border-rose-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} focus:outline-none focus:ring-2 transition text-sm">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                <a href="{{ route('products.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow-sm transition">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
