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
            <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
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

            <div class="divide-y divide-white/5">
              <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                  <h2 class="text-base font-semibold leading-7 text-gray-700">Personal Information</h2>
                  <p class="mt-1 text-sm leading-6 text-gray-400">Use a permanent address where you can receive mail.</p>
                </div>

                <form class="md:col-span-2">
                  <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                    <div class="col-span-full flex items-center gap-x-8">
                      <img src="{{ asset($agen->foto_agen) }}" alt="" class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover">
                      <div>
                        <button type="button" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400">Change avatar</button>
                        <p class="mt-2 text-xs leading-5 text-gray-400">JPG, GIF or PNG. 1MB max.</p>
                      </div>
                    </div>

                    <div class="col-span-full">
                      <label for="first-name" class="block text-sm font-medium leading-6 text-gray-700">Nama Agen</label>
                      <div class="mt-2">
                        <input id="nama_grosir" name="nama_grosir" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4" value="{{ $agen->nama_agen }}">
                        @error('nama_grosir')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="col-span-full">
                      <label for="email" class="block text-sm font-medium leading-6 text-gray-700">Email address</label>
                      <div class="mt-2">
                        <textarea id="alamat_agen" name="alamat_agen" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">{{ $agen->alamat_agen }}</textarea>
                        @error('alamat_agen')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="col-span-full">
                      <label for="username" class="block text-sm font-medium leading-6 text-gray-700">Username</label>
                      <div class="mt-2">
                        <input id="nama_grosir" name="nama_grosir" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">
                        @error('nama_grosir')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="mt-8 flex">
                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                  </div>
                </form>
              </div>

              <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                  <h2 class="text-base font-semibold leading-7 text-gray-700">Change password</h2>
                  <p class="mt-1 text-sm leading-6 text-gray-400">Update your password associated with your account.</p>
                </div>

                <form class="md:col-span-2">
                  <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                    <div class="col-span-full">
                      <label for="current-password" class="block text-sm font-medium leading-6 text-gray-700">Current password</label>
                      <div class="mt-2">
                        <input id="current-password" name="current-password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">
                        @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="col-span-full">
                      <label for="new-password" class="block text-sm font-medium leading-6 text-gray-700">New password</label>
                      <div class="mt-2">
                        <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">
                        @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="col-span-full">
                      <label for="confirm-password" class="block text-sm font-medium leading-6 text-gray-700">Confirm password</label>
                      <div class="mt-2">
                        <input id="confirm-password" name="confirm-password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">
                        @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="mt-8 flex">
                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                  </div>
                </form>
              </div>

              <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                  <h2 class="text-base font-semibold leading-7 text-gray-700">Delete account</h2>
                  <p class="mt-1 text-sm leading-6 text-gray-400">No longer want to use our service? You can delete your account here. This action is not reversible. All information related to this account will be deleted permanently.</p>
                </div>

                <form class="flex items-start md:col-span-2">
                  <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400">Yes, delete my account</button>
                </form>
              </div>
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