@extends('layouts.app')

@section('title', 'Detail Produk - ' . $product->name)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Header Page -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Produk</h1>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap tentang produk.</p>
        </div>
        <a href="{{ route('products.index') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar
        </a>
    </div>

    <!-- Detail Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 sm:p-8 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 pb-6 border-b border-gray-100">
                <div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->stock > 10 ? 'bg-emerald-100 text-emerald-800' : ($product->stock > 0 ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }} mb-2">
                        Stok: {{ $product->stock }} unit
                    </span>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h2>
                    <p class="text-3xl font-extrabold text-indigo-600 mt-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 text-sm font-medium rounded-lg transition">
                        Edit Produk
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 text-sm font-medium rounded-lg transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

            <!-- Description -->
            <div>
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-2">Deskripsi Produk</h3>
                <div class="text-gray-600 text-sm leading-relaxed bg-gray-50 rounded-xl p-4 border border-gray-100">
                    {{ $product->description ?: 'Tidak ada deskripsi untuk produk ini.' }}
                </div>
            </div>

            <!-- Timestamps -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-gray-100 text-xs text-gray-500">
                <div>
                    <span class="font-medium text-gray-700">Dibuat pada:</span>
                    {{ $product->created_at ? $product->created_at->translatedFormat('d F Y H:i') : '-' }}
                </div>
                <div>
                    <span class="font-medium text-gray-700">Terakhir diperbarui:</span>
                    {{ $product->updated_at ? $product->updated_at->translatedFormat('d F Y H:i') : '-' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
