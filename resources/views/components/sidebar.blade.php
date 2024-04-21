<div class="w-1/5 h-screen text-white">
    <div class="w-full h-full bg-red-600 lg">
        <div class="flex justify-between w-full px-4 py-8 font-semibold ">
            <p><span>[o]</span> SIMS Web App
            <p>
            <p>[o]</p>
        </div>
        <div class="w-full">
            @auth
                <div class="flex flex-col">
                    <a href="{{ route('products.index') }}"
                        class="{{ request()->fullUrlIs(url('products')) ? 'bg-red-800' : 'bg-red-600' }} px-4 py-2 hover:bg-red-500 hover:font-semibold"><span>[o]</span>
                        Produk</a>
                    <a class="{{ request()->fullUrlIs(url('profile')) ? 'bg-red-800' : 'bg-red-600' }} px-4 py-2 hover:bg-red-500 hover:font-semibold"
                        href="{{ route('profile') }}"><span>[o]</span>
                        Profil</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="px-4 py-2 hover:bg-red-500 hover:font-semibold"><span>[o]</span>
                            Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</div>
