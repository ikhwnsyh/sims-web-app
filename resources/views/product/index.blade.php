<x-app-layout>
    <div class="flex">
        <x-sidebar></x-sidebar>
        <div class="flex-1">
            <div class="px-4 sm:px-6 lg:px-8">
                <h1 class="py-8 text-lg font-semibold leading-6 text-gray-900">Daftar Produk</h1>
                <div class="sm:flex sm:items-center">
                    <div class="space-x-4 sm:flex-auto">
                        <div class="flex space-x-4">
                            <form action="{{ route('products.index') }}" method="get">
                                <input type="text" name="search" class=" p-0.5 border rounded-md shadow-sm"
                                    placeholder="Cari Barang">
                                <button type="submit">Search</button>
                            </form>
                                <select name="category" onchange="filterProduct()">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <div class="flex gap-x-2">
                            <x-primary-button as='a' class="bg-green-700 hover:bg-green-600"
                                href="{{ route('export') }}">Eksport Excel</x-primary-button>
                            <x-primary-button as='a' class="bg-red-700 hover:bg-red-600"
                                href="{{ route('products.create') }}">Tambah produk</x-primary-button>
                        </div>
                    </div>
                </div>
                <div class="flow-root mt-8">
                    <x-table>
                        <thead class="bg-gray-50">
                            <tr>
                                <x-table.th>No</x-table.th>
                                <x-table.th>Image</x-table.th>
                                <x-table.th>Nama Produk</x-table.th>
                                <x-table.th>Kategori</x-table.th>
                                <x-table.th>Harga Beli (Rp)</x-table.th>
                                <x-table.th>Harga Jual (Rp)</x-table.th>
                                <x-table.th>Stok Produk</x-table.th>
                                <x-table.th>Aksi</x-table.th>
                            </tr>
                        </thead>
                        <x-table.tbody id="productTable">
                            @forelse ($products as $index => $product)
                                <tr>
                                    <x-table.td>{{ $index + 1 }}</x-table.td>
                                    <x-table.td>
                                        @if ($product->image)
                                            <img src="{{ asset($product->image) }}" alt="" class="w-12">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </x-table.td>
                                    <x-table.td>{{ $product->name }}</x-table.td>
                                    <x-table.td>{{ $product->category->name }}</x-table.td>
                                    <x-table.td>{{ $product->buy_price }}</x-table.td>
                                    <x-table.td>{{ $product->sell_price }}</x-table.td>
                                    <x-table.td>{{ $product->stock }}</x-table.td>
                                    <x-table.td>
                                        <div class="flex gap-x-2">
                                            <x-primary-button as='a' class=" bg-zinc-50 hover:bg-zinc-100"
                                                href="{{ route('products.edit', $product) }}"><img
                                                    src="{{ asset('assets/edit.png') }}"
                                                    alt=""></x-primary-button>
                                            <x-primary-button class=" bg-zinc-50 hover:bg-zinc-100" data-modal-target="popup-modal"
                                            data-modal-toggle="popup-modal"><img
                                                src="{{ asset('assets/delete.png') }}"
                                                alt=""></x-primary-button>
                                        </div>
                                    </x-table.td>
                                </tr>
                                <div id="popup-modal" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full min-h-screen overflow-x-hidden overflow-y-auto ">
                                <div class="relative w-full max-w-md max-h-full p-4">
                                    <div class="relative flex bg-white border rounded-lg shadow-sm ">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 text-center md:p-5">
                                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                                                delete this product?</h3>
                                                <form action="{{ route('products.destroy', $product) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <x-primary-button  data-modal-hide="popup-modal" as='button' class="items-center bg-red-500 hover:bg-red-400"
                                                        href="{{ route('products.destroy', $product) }}" >Delete</x-primary-button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <div class=" bg-red-500 px-4 py-2.5 w-full">
                                <div class="text-lg font-semibold text-white "><span>Tidak ada product</span></div>
                            </div>
                            @endforelse
                        </x-table.tbody>
                    </x-table>
                   
                </div>
                    <div class="my-2 ">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const modalButtons = document.querySelectorAll('[data-modal-toggle]');
            const modalCloseButtons = document.querySelectorAll('[data-modal-hide]');

            modalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetModal = document.getElementById(this.dataset.modalTarget);
                    targetModal.classList.toggle('hidden');
                });
            });

            modalCloseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetModal = document.getElementById(this.dataset.modalHide);
                    targetModal.classList.add('hidden');
                });
            });
        });
        function filterProduct() {
            const category = $('[name="category"]').val()
            $.ajax({
                url: '{{ route("filter") }}',
                method: 'GET',
                data: {
                    category_id: category
                },
                success: function(res) {
                    const table = $('#productTable')
                    table.empty()
                    res.data.map((item, index) => {
                        console.log(item)
                        let image = ''
                        if (item.image) {
                            image = `<img src=" ${ item.image }" alt="" class="w-12">`
                        } else {
                            image = 'tidak ada gambar';
                        }
                        const product =
                            `
                        <tr>
                            <td>${index + 1 } </td>
                                <td>
                                   ${image}
                                </td>
                                    <td>${ item.name }</td>
                                    <td>${ item.category.name }</td>
                                    <td>${ item.buy_price }</td>
                                    <td>${ item.sell_price }</td>
                                    <td>${ item.stock }</td>
                                    <td>
                                        <div class="flex gap-x-2">
                                            <a  class=" bg-zinc-50 hover:bg-zinc-100"
                                                href="${ 'products/'+item.id+'/edit'}"><img
                                                    src="${'{{ asset("assets/edit.png") }}'}"
                                                    alt=""></a>
                                            <form action="${'products/'+item.id+'/delete'}" method="post">
                                                @csrf
                                                <button type="submit"><img
                                                    src="${'{{ asset("assets/delete.png") }}'}"
                                                    alt=""></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        `
                        table.append(product)
                    })
                }
            })
        }

    </script>
</x-app-layout>
