<!doctype html>
<html lang="en" class="h-full bg-gray-50">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aplikasi Grosir</title>

  @vite('resources/css/app.css')

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full">

<div x-data="{ open: false }" @keydown.window.escape="open = false">

  <div x-show="open" class="relative z-50 lg:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true">

    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state."></div>


    <div class="fixed inset-0 flex">

      <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative mr-16 flex w-full max-w-xs flex-1" @click.away="open = false">

        <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Close button, show/hide based on off-canvas menu state." class="absolute left-full top-0 flex w-16 justify-center pt-5">
          <button type="button" class="-m-2.5 p-2.5" @click="open = false">
            <span class="sr-only">Close sidebar</span>
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Sidebar component, swap this element with another sidebar if you like -->
        @include('components.agen.navbar')

      </div>

    </div>
  </div>

  <!-- Static sidebar for desktop -->
  @include('components.agen.sidebar')

  <div class="sticky top-0 z-40 flex items-center gap-x-6 bg-white px-4 py-4 shadow-sm sm:px-6 lg:hidden">
    <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="open = true">
      <span class="sr-only">Open sidebar</span>
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
      </svg>
    </button>
    <div class="flex-1 text-sm font-semibold leading-6 text-gray-900">Dashboard</div>
    <a href="#">
      <span class="sr-only">Your profile</span>
      <img class="h-8 w-8 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
    </a>
  </div>

  <main class="py-10 lg:pl-72">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="relative h-full overflow-hidden rounded-xl shadow-sm">
        <div class="bg-white py-10">
          <div class="mx-auto max-w-7xl">

            <div class="relative flex justify-center overflow-hidden rounded-xl">
              <form class="w-screen max-w-screen-md bg-white shadow-sm p-8 rounded-xl" action="/agen/profil/" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (session('success'))
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                  </div>
                @endif

                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">


                <div class="space-y-12">
                  <div class="pb-12 border-b border-gray-900/10">
                    <h2 class="text-xl font-semibold leading-7 text-gray-900">Profil Agen</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600"></p>

                    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                      <div class="col-span-full">
                        <label for="foto_agen" class="block text-sm font-medium leading-6 text-gray-900">Foto Profil</label>
                        <div class="mt-2 flex items-center gap-x-3">
                          @if( $agen->foto_agen == 'default.jpg')
                          <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                          </svg>
                          @else
                          <img class="h-12 w-12 rounded-full bg-gray-50" src="{{ asset('img/profile/agen/' . $agen->foto_agen) }}" alt="">
                          @endif
                          <input id="foto_agen" name="foto_agen" type="file" class="sr-only">
                          <label for="foto_agen" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Ubah</label>
                        </div>
                        @error('foto_agen')
                          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="sm:col-span-full">
                        <label for="nama_agen" class="block text-sm font-medium leading-6 text-gray-900">Nama Agen</label>
                        <div class="mt-2">
                          <input id="nama_agen" name="nama_agen" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4" value="{{ $agen->nama_agen }}">
                          @error('nama_agen')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>

                      <div class="col-span-full">
                        <label for="alamat_agen" class="block text-sm font-medium leading-6 text-gray-900">Alamat Agen</label>
                        <div class="mt-2">
                          <textarea id="alamat_agen" name="alamat_agen" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">{{ $agen->alamat_agen }}</textarea>
                          @error('alamat_agen')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>

                      <div class="sm:col-span-full">
                        <div>
                          <label for="nomor_telefon_agen" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telefon</label>
                          <div class="mt-2">
                            <input id="nomor_telefon_agen" name="nomor_telefon_agen" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4"  value="{{ $agen->nomor_telefon_agen }}">
                            @error('nomor_telefon_agen')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="flex items-center justify-end mt-6 gap-x-6">
                    <a href="/agen/" class="px-3 py-2 text-sm font-semibold text-gray-500 border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kembali</a>
                    <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
</div>

</div>

<script>
    document.getElementById('harga_produk').addEventListener('input', function (event) {
        const nimInput = event.target;
        nimInput.value = nimInput.value.replace(/[^0-9]/g, '');
    });
    document.getElementById('stok_produk').addEventListener('input', function (event) {
        const nimInput = event.target;
        nimInput.value = nimInput.value.replace(/[^0-9]/g, '');
    });
</script>
</body>
</html>