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

<div class="overflow-hidden">
  <div class="bg-white">
    @include('components.grosir.navbar')

    <div class="relative isolate pt-12">
      <div class="relative flex justify-center overflow-hidden rounded-xl">
        <form class="w-screen max-w-screen-md bg-white shadow-sm p-8 rounded-xl" action="{{ route('grosir.profile.update') }}" method="POST" enctype="multipart/form-data">
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
              <h2 class="text-xl font-semibold leading-7 text-gray-900">Profil Grosir</h2>
              <p class="mt-1 text-sm leading-6 text-gray-600"></p>

              <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="col-span-full">
                  <label for="foto_grosir" class="block text-sm font-medium leading-6 text-gray-900">Foto Profil</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    @if( $grosir->foto_grosir == 'default.jpg')
                      <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                      </svg>
                    @else
                      <img class="h-12 w-12 rounded-full bg-gray-50" src="{{ asset('img/profile/agen/' . $grosir->foto_grosir) }}" alt="">
                    @endif
                    <input id="foto_grosir" name="foto_grosir" type="file" class="sr-only">
                    <label for="foto_grosir" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 cursor-pointer">Ubah</label>
                  </div>
                  @error('foto_grosir')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <div class="sm:col-span-full">
                  <label for="nama_grosir" class="block text-sm font-medium leading-6 text-gray-900">Nama Grosir</label>
                  <div class="mt-2">
                    <input id="nama_grosir" name="nama_grosir" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4" value="{{ $grosir->nama_grosir }}">
                    @error('nama_grosir')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="alamat_grosir" class="block text-sm font-medium leading-6 text-gray-900">Alamat Grosir</label>
                  <div class="mt-2">
                    <textarea id="alamat_grosir" name="alamat_grosir" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">{{ $grosir->alamat_grosir }}</textarea>
                    @error('alamat_grosir')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <div>
                    <label for="nomor_telefon_grosir" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telefon</label>
                    <div class="mt-2">
                      <input id="nomor_telefon_grosir" name="nomor_telefon_grosir" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4"  value="{{ $grosir->nomor_telefon_grosir }}">
                      @error('nomor_telefon_grosir')
                      <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="pb-12 border-b border-gray-900/10">
              <h2 class="text-xl font-semibold leading-7 text-gray-900">Data Akun</h2>
              <p class="mt-1 text-sm leading-6 text-gray-600"></p>

              <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-full">
                  <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username Grosir</label>
                  <div class="mt-2">
                    <input id="username" name="username" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4" value="{{ Auth::user()->username }}">
                    @error('username')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="sm:col-span-full">
                  <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password</label>
                  <div class="mt-2">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4">
                    @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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

@include('components.grosir.footer')
</body>
</html>