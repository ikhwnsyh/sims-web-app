<x-app-layout>
    <div class="flex w-full h-screen">
        <div class="flex flex-col items-center justify-center w-1/2 h-full">
            <div class="text-center font-semibold flex flex-col gap-8 w-[75%]">
                <p class="text-lg"><span>[O]</span> SIMS Web App</p>
                <div class="text-2xl">
                    <p>Masuk atau buat akun</p>
                    <p>untuk memulai</p>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <input type="text" class="px-2 py-1 font-normal border border-gray-300"
                            placeholder="@ masukkan email anda" value="{{ old('email') }}" name="email" />
                        @error('email')
                            <span class="text-sm text-red-500 ">{{ $message }}</span>
                        @enderror
                        <input type="password" class="px-2 py-1 font-normal border border-gray-300"
                            placeholder="** masukkan password anda" name="password" />
                        @error('password')
                            <span class="text-sm text-red-500 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="w-full p-2 mt-2 text-xs text-white bg-red-600">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/2 ">
            <img src="{{ asset('assets/background.png') }}" alt="" class="object-cover w-full h-full">
        </div>
    </div>
</x-app-layout>
