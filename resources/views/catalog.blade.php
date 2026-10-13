<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Produk E-Commerce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filter Kategori -->
            <div class="mb-6 flex gap-2 overflow-x-auto pb-2">
                <a href="{{ route('catalog.index') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium {{ !request('category') ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                   Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium {{ request('category') == $category->slug ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                       {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Grid Produk -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($products as $product)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-between">
                        <div>
                            <!-- Bagian Gambar Produk -->
                            <img src="{{ $product->image ? (Str::startsWith($product->image, 'http') ? $product->image : asset('storage/'.$product->image)) : 'https://via.placeholder.com/300' }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-48 object-cover">
                            
                            <div class="p-4">
                                <span class="text-xs text-indigo-600 uppercase font-bold tracking-wider">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                                <h3 class="text-lg font-bold text-gray-900 mt-1">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $product->description }}</p>
                                <div class="mt-3 text-xl font-extrabold text-gray-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Stok: {{ $product->stock }}</p>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-50 border-t border-gray-100">
                            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded-lg transition duration-200">
                                + Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white p-6 text-center text-gray-500 rounded-lg">
                        Belum ada produk yang tersedia.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>