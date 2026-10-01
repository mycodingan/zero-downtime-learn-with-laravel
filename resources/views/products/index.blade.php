@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="space-y-6">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Daftar Produk</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data inventaris dan produk barang Anda di sini.</p>
        </div>
        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm transition shadow-sm w-fit">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/75 border-b border-gray-200 text-xs font-semibold uppercase tracking-wider text-gray-500">
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama Produk</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Deskripsi</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    @forelse ($products as $index => $product)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4 text-gray-500 font-medium">
                                {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                <a href="{{ route('products.show', $product) }}" class="hover:text-indigo-600 transition">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 font-medium text-emerald-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->stock > 10 ? 'bg-emerald-100 text-emerald-800' : ($product->stock > 0 ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                    {{ $product->stock }} unit
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 max-w-xs truncate">
                                {{ $product->description ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('products.show', $product) }}" class="inline-flex items-center px-2.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md text-xs font-medium transition">
                                    Detail
                                </a>
                                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-2.5 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-md text-xs font-medium transition">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-2.5 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-md text-xs font-medium transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <p class="text-base font-medium text-gray-600">Belum ada data produk</p>
                                    <a href="{{ route('products.create') }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-semibold">
                                        + Tambah Produk Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
