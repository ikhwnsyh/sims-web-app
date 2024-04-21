<x-app-layout>
    <div class="flex">
        <x-sidebar></x-sidebar>
        <div class="flex-1 ">
            <div class="px-4 sm:px-6 lg:px-8">
                <h1 class="py-8 text-lg font-semibold leading-6 text-gray-900">Daftar Produk</h1>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method($page_meta['method'])
                    <div class="grid grid-cols-2 ">
                        <div>
                            <label for="category_id" class="block mb-2 ">Kategori</label>
                            <select name="category_id"
                                class="block w-2/3 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                <option selected value="">Choose Category</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                 <span class="block text-sm text-red-500">{{ $message }}</span>
                             @enderror
                        </div>
                        <div>
                            <label for="nama_produk" class="block mb-2 ">Nama Produk</label>
                            <input type="text" name="name" class="w-full px-4 py-2 border rounded shadow-sm"
                                value="{{ $product->name ?? old('name') }}">
                            @error('name')
                                <span class="block text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 space-x-2 ">
                        <div>
                            <label for="harga_beli" class="block mb-2 ">Harga Beli</label>
                            <input type="number" name="buy_price" class="w-full px-4 py-2 border rounded shadow-sm"
                                value="{{ $product->buy_price ?? old('buy_price') }}">
                            @error('buy_price')
                                <span class="block text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="stok" class="block mb-2 ">Stok</label>
                            <input type="number" name="stock" class="w-full px-4 py-2 border rounded shadow-sm"
                                value="{{ $product->stock ?? old('stock') }}">
                            @error('stock')
                                <span class="block text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 ">
                        <input type="file" name="image" class="w-full ">
                    </div>
                    <div class="flex justify-end mt-4 space-x-4">
                        <x-primary-button as='a' class="bg-red-500 hover:bg-red-400">Batal</x-primary-button>
                        <x-primary-button>{{ $page_meta['button_text'] }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
