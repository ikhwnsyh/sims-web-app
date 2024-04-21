<x-app-layout>
    <div class="flex">
        <x-sidebar></x-sidebar>
        <div class="flex-1">
            <div class="px-4 sm:px-6 lg:px-8">
                <img src="https://i.pravatar.cc/200" alt="avatar" class="mt-4 rounded-full flex-shrink-1 ">
                <h1 class="py-8 text-2xl font-semibold leading-6 text-gray-900">{{ $user->name }}k</h1>
            <div class="grid grid-cols-2 space-x-2 ">
                <div>
                    <label for="nama" class="block mb-2 text-sm">Nama Kandidat</label>
                    <input type="text"  class="w-full px-4 py-2 border rounded shadow-sm" value="{{ $user->name }}" disabled>
                </div>
                <div>
                    <label for="posisi" class="block mb-2 text-sm">Posisi Kandidat</label>
                    <input type="text" class="w-full px-4 py-2 border rounded shadow-sm" value="Web Programmer (PHP)" disabled>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
