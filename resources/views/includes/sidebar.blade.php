<ul class="min-h-full space-y-2 ">
    <li><a href="{{ route('dashboard') }}"
            class=" hover:bg-gray-600 transition duration-300 hover:scale-90 mx-2 {{ request()->is('dashboard*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-house"></i>Dashboard</a>
    </li>
    @if (Auth::user()->roles == 'SUPER ADMIN')
        <li><a href="{{ route('merks.index') }}"
                class=" hover:bg-gray-600  transition duration-300 hover:scale-90 mx-2 {{ request()->is('merks*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-sitemap"></i>Merks</a>
        </li>

     <li><a href="{{ route('barangs.index') }}"
            class=" hover:bg-gray-600  transition duration-300 hover:scale-90 mx-2 {{ request()->is('barangs*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-layer-group"></i>Barang</a>
    </li>
    @endif
    <li><a href="{{ route('transactions.index') }}"
            class=" hover:bg-gray-600  transition duration-300 hover:scale-90 mx-2 {{ request()->is('transactions*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-file-invoice pr-1"></i>Transaksi</a>
    </li>

    @if (Auth::user()->roles == 'SUPER ADMIN')
        <li><a href="{{ route('user-settings.index') }}"
                class=" hover:bg-gray-800 transition duration-300 hover:scale-90 mx-2 {{ request()->is('user*') ? 'bg-gray-900 text-white  font-semibold' : 'text-gray-400' }}"><i
                    class="fa-solid fa-users"></i>User</a>
        </li>
    @endif
</ul>
