<!doctype html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  @vite('resources/css/app.css')
</head>
<body class="h-full">
<div class="flex flex-1 min-h-full">
  <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="w-full max-w-sm mx-auto lg:w-96">
      <div>
        <img class="w-auto h-10" src="../img/logo/logo.png" alt="Agen Telur">
        <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900">Masuk sebagai Grosir</h2>
      </div>

      <div class="mt-10">
        <div>
          <form action="/grosir/masuk" method="POST" class="space-y-6">

            @csrf

            <div>
              <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
              <div class="mt-2">
                <input id="username" name="username" type="text" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4" placeholder="Masukan username Anda">
              </div>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-4" placeholder="Masukan password Anda">
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
            </div>
          </form>

          @if ($errors->any())
            <div class="bg-white">
              <div class="py-12 mx-auto max-w-7xl">
                <div class="max-w-4xl mx-auto">
                  <div class="p-4 rounded-md bg-red-50">
                    <div class="flex">
                      <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"></path>
                        </svg>
                      </div>
                      <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Ada {{ $errors->count() }} kesalahan</h3>
                        <div class="mt-2 text-sm text-red-700">
                          <ul role="list" class="pl-5 space-y-1 list-disc">
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif

        </div>

        <div class="mt-10">

          <div class="flex justify-center gap-4 mt-6">
            <span class="text-gray-400">Belum punya akun?</span>
            <a href="/grosir/daftar" class="font-semibold text-indigo-600 duration-150 hover:text-indigo-400">Daftar disini</a>
          </div>
        </div>

        <div class="mt-10">
          <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
              <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm font-medium leading-6">
              <span class="px-6 text-gray-900 bg-white"></span>
            </div>
          </div>

          <div class="flex justify-center gap-4 mt-6">
            <span class="text-gray-400">Bukan Grosir?</span>
            <a href="/agen/masuk" class="font-semibold text-indigo-600 duration-150 hover:text-indigo-400">Masuk sebagai Agen</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="relative flex-1 hidden w-0 lg:block">
    <img class="absolute inset-0 object-cover w-full h-full" src="../img/login/login-grosir.png" alt="">
  </div>
</div>

</div>
</body>
</html>