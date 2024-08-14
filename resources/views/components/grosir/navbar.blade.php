<header x-data="{ open: false }" @keydown.window.escape="open = false" class="absolute inset-x-0 top-0 z-50">
  <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="-m-1.5 p-1.5">
        <span class="sr-only">Your Company</span>
        <img class="h-8 w-auto" src="{{ asset('img/logo/logo.png') }}" alt="">
      </a>
    </div>
    <div class="flex lg:hidden">
      <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="open = true">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
        </svg>
      </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
      <a href="/grosir" class="text-sm font-semibold leading-6
        {{ request()->path() == 'grosir' ? 'text-indigo-500' : 'text-gray-900'}}
      ">Beranda</a>
      <a href="/grosir/produk" class="text-sm font-semibold leading-6
      {{ Str::startsWith(request()->path(), 'grosir/produk') == 'grosir/produk' ? 'text-indigo-500' : 'text-gray-900'}}
      ">Produk</a>
      <a href="/grosir/pesanan" class="text-sm font-semibold leading-6
      {{ Str::startsWith(request()->path(), 'grosir/pesanan') == 'grosir/pesanan' ? 'text-indigo-500' : 'text-gray-900'}}
      ">Pesanan Saya</a>
      <a href="/grosir/tentang" class="text-sm font-semibold leading-6
      {{ request()->path() == 'grosir/tentang' ? 'text-indigo-500' : 'text-gray-900'}}
      ">Tentang Kami</a>


    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-8">
      <div class="flex gap-4 items-center">
        <a href="/grosir/keranjang" class="text-sm font-semibold leading-6 text-gray-900">
          <span aria-hidden="true">
            <svg class="duration-150
            {{ request()->path() == 'grosir/keranjang' ? 'fill-indigo-600 hover:fill-indigo-500' : 'fill-gray-900 hover:fill-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M21 4H2v2h2.3l3.28 9a3 3 0 0 0 2.82 2H19v-2h-8.6a1 1 0 0 1-.94-.66L9 13h9.28a2 2 0 0 0 1.92-1.45L22 5.27A1 1 0 0 0 21.27 4 .84.84 0 0 0 21 4zm-2.75 7h-10L6.43 6h13.24z"></path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="16.5" cy="19.5" r="1.5"></circle></svg>
          </span>
        </a>
        <a href="/grosir/wishlist" class="text-sm font-semibold leading-6 text-gray-900">
          <span aria-hidden="true">
            <svg class="duration-150
            {{ request()->path() == 'grosir/wishlist' ? 'fill-indigo-600 hover:fill-indigo-500' : 'fill-gray-900 hover:fill-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path></svg>
          </span>
        </a>
        <a href="/grosir/profil" class="text-sm font-semibold leading-6 text-gray-900">
          <span aria-hidden="true">
            <svg class="duration-150
            {{ request()->path() == 'grosir/profil' ? 'fill-indigo-600 hover:fill-indigo-500' : 'fill-gray-900 hover:fill-gray-500' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
          </span>
        </a>
      </div>
      <span class="text-gray-300 select-none">
        |
      </span>
      <form action="/logout" method="POST" class="flex justify-center items-center">
        @csrf

        <button type="submit" class="text-red-500 text-sm font-semibold leading-6 text-gray-900 hover:text-red-300 duration-150">
          <span class="sr-only">Logout</span>
          <span aria-hidden="true">Logout</span>
        </button>

      </form>
    </div>
  </nav>
  <div x-description="Mobile menu, show/hide based on menu open state." class="lg:hidden" x-ref="dialog" x-show="open" aria-modal="true">
    <div x-description="Background backdrop, show/hide based on slide-over state." class="fixed inset-0 z-50"></div>
    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10" @click.away="open = false">
      <div class="flex items-center justify-between">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600" alt="">
        </a>
        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="open = false">
          <span class="sr-only">Close menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>

          </div>
          <div class="py-6">
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Keranjang</a>
            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Profil</a>
          </div>
          <div class="py-6">
            <form action="/logout" method="POST" class="flex justify-center items-center">
              @csrf

              <button type="submit" class="w-full rounded-lg text-red-500 gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-50">
                <span class="sr-only">Logout</span>
                <span aria-hidden="true">Logout</span>
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>