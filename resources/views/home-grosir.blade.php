
<!doctype html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home Grosir</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-full">
  @include('components.grosir.navbar-grosir')
  <section class="relative h-[70vh] bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1498654077810-12c21d4d6dc3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex flex-col items-start justify-center h-full p-10 text-white md:p-20 lg:p-32">
      <h1 class="mb-4 text-4xl font-bold md:text-5xl lg:text-6xl">Telur Ayam Berkualitas dan Terbaik</h1>
      <p class="mb-8 text-lg md:text-xl lg:text-2xl">Nikmati telur ayam premium kami, yang dihasilkan dari ayam yang dirawat dengan baik dan diberi pakan berkualitas tinggi. Setiap telur dipilih dengan teliti untuk memastikan kesegaran dan nutrisi terbaik.</p>      
      <a href="#" class="flex items-center px-6 py-3 font-bold text-black bg-yellow-400 rounded-full hover:bg-yellow-500">
        Pesan Sekarang 
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1.38-4.553A1 1 0 0017.42 7H6.58a1 1 0 00-.975.757L4.2 13M7 13l-1 6m1-6h10m-9 0l1 6m0 0H8m1 0h6m-1 0l1-6m0 0h-1m-9 0H4m4 0h8" />
        </svg>
      </a>
    </div>
  </section>
  <section class="py-20 bg-gray-100">
    <div class="container max-w-6xl mx-auto text-center">
      <h2 class="mb-10 text-4xl font-bold text-gray-300">KANDUNGAN TELUR</h2>
      <div class="flex flex-wrap justify-center gap-8">
        <div class="flex-shrink-0 w-full max-w-xs p-4 text-center">
          <img src="{{ asset('upload/foto_produk/ayam.png') }}" alt="Protein" class="object-contain w-16 h-16 mx-auto mb-4">
          <h3 class="mb-2 text-xl font-bold text-brown-700">PROTEIN</h3>
          <p class="text-gray-600">Telur mengandung sekitar 6 gram protein berkualitas tinggi.</p>
        </div>
        <div class="flex-shrink-0 w-full max-w-xs p-4 text-center">
          <img src="{{ asset('upload/foto_produk/ayam.png') }}" alt="Vitamins" class="object-contain w-16 h-16 mx-auto mb-4">
          <h3 class="mb-2 text-xl font-bold text-brown-700">VITAMIN</h3>
          <p class="text-gray-600">Telur kaya akan vitamin seperti vitamin A, D, E, dan B12.</p>
        </div>
        <div class="flex-shrink-0 w-full max-w-xs p-4 text-center">
          <img src="{{ asset('upload/foto_produk/ayam.png') }}" alt="Minerals" class="object-contain w-16 h-16 mx-auto mb-4">
          <h3 class="mb-2 text-xl font-bold text-brown-700">MINERAL</h3>
          <p class="text-gray-600">Telur mengandung mineral penting seperti besi, fosfor, dan selenium.</p>
        </div>
      </div>
    </div>
  </section>


  <section class="relative overflow-hidden bg-gray-50">
    <div class="absolute inset-0 z-0 bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1441122456239-401e92b73c65?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"></div>
    <div class="relative z-10 max-w-2xl px-4 py-16 mx-auto text-center sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="mb-10 text-4xl font-bold text-gray-100">PRODUK TELUR</h2>
        <div class="relative flex flex-col w-full max-w-xs m-10 overflow-hidden bg-gray-100 border border-gray-100 rounded-lg shadow-md">
            @foreach($produks as $produk)
            <a class="relative flex mx-3 mt-3 overflow-hidden h-60 rounded-xl" href="#">
                <img class="object-cover" src="{{ $produk->foto_produk }}" alt="product image" />
                <span class="absolute top-0 left-0 px-2 m-2 text-sm font-medium text-center text-white bg-black rounded-full">New</span>
            </a>
            <div class="px-5 pb-4 mt-4 lg:pb-3">
                <a href="#">
                    <h5 class="text-xl tracking-tight text-slate-900">{{ $produk->nama_produk }}</h5>
                </a>
                <div class="flex items-center justify-between mt-2 mb-5">
                    <p>
                        <span class="text-3xl font-bold text-slate-900">Rp.{{ number_format($produk->harga_produk, 2, ',', '.') }}</span>
                    </p>
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                        <span class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">5.0</span>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="#" class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-yellow-400 border border-transparent rounded-md hover:bg-gray-200">Pesan Sekarang<span class="sr-only"></span></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="bg-white">
  <div class="px-4 py-24 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="px-6 py-16 rounded-2xl bg-gray-50 sm:p-16">
      <div class="max-w-xl mx-auto lg:max-w-none">
        <div class="text-center">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Kami membangun bisnis kami di atas layanan pelanggan</h2>
        </div>
        <div class="grid max-w-sm grid-cols-1 mx-auto mt-12 gap-x-8 gap-y-10 sm:max-w-none lg:grid-cols-3">
          <div class="text-center sm:flex sm:text-left lg:block lg:text-center">
            <div class="sm:flex-shrink-0">
              <div class="flow-root">
                <img class="w-16 h-16 mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-warranty-simple.svg" alt="">
              </div>
            </div>
            <div class="mt-3 sm:ml-6 sm:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-sm font-medium text-gray-900">Produk Segar Setiap Hari</h3>
              <p class="mt-2 text-sm text-gray-500">Kami menjamin produk yang Anda terima selalu segar setiap hari, langsung dari petani terpercaya.</p>
            </div>
          </div>
          <div class="text-center sm:flex sm:text-left lg:block lg:text-center">
            <div class="sm:flex-shrink-0">
              <div class="flow-root">
                <img class="w-16 h-16 mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-warranty-simple.svg" alt="">
              </div>
            </div>
            <div class="mt-3 sm:ml-6 sm:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-sm font-medium text-gray-900">Harga Terbaik di Pasaran</h3>
              <p class="mt-2 text-sm text-gray-500">Kami menawarkan harga terbaik untuk semua produk kami, memastikan Anda mendapatkan nilai maksimal.</p>
            </div>
          </div>
          <div class="text-center sm:flex sm:text-left lg:block lg:text-center">
            <div class="sm:flex-shrink-0">
              <div class="flow-root">
                <img class="w-16 h-16 mx-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-shipping-simple.svg" alt="">
              </div>
            </div>
            <div class="mt-3 sm:ml-6 sm:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-sm font-medium text-gray-900">Pengiriman di Hari yang Sama</h3>
              <p class="mt-2 text-sm text-gray-500">Pesan hari ini, terima di hari yang sama. Kami memastikan produk sampai di tangan Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- blog -->
<div>
  <div class="py-24 bg-gray-200 sm:py-32">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">
      <div class="max-w-2xl mx-auto lg:max-w-4xl">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Berita Terbaru Tentang Telur</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">Pelajari manfaat dan jenis telur yang banyak dibeli untuk kesehatan Anda.</p>
        <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
          <article class="relative flex flex-col gap-8 isolate lg:flex-row">
            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
              <img src="https://images.unsplash.com/photo-1607690424395-6660d838d818?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Telur Ayam" class="absolute inset-0 object-cover w-full h-full rounded-2xl bg-gray-50">
              <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
            </div>
            <div>
              <div class="flex items-center text-xs gap-x-4">
                <time datetime="2024-07-26" class="text-gray-500">Jul 26, 2024</time>
                <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Kesehatan</a>
              </div>
              <div class="relative max-w-xl group">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    Manfaat Telur untuk Kesehatan
                  </a>
                </h3>
                <p class="mt-5 text-sm leading-6 text-gray-600">Telur adalah sumber protein yang sangat baik. Mereka juga mengandung banyak vitamin dan mineral penting yang dibutuhkan tubuh, seperti vitamin B12, vitamin D, dan zat besi. Konsumsi telur secara rutin dapat membantu meningkatkan kesehatan otak, menjaga kesehatan mata, dan menguatkan otot.</p>
              </div>
              <div class="flex pt-6 mt-6 border-t border-gray-900/5">
                <div class="relative flex items-center gap-x-4">
                  <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="John Doe" class="w-10 h-10 rounded-full bg-gray-50">
                  <div class="text-sm leading-6">
                    <p class="font-semibold text-gray-900">
                      <a href="#">
                        <span class="absolute inset-0"></span>
                        Dr. John Doe
                      </a>
                    </p>
                    <p class="text-gray-600">Ahli Gizi</p>
                  </div>
                </div>
              </div>
            </div>
          </article>
  
          <article class="relative flex flex-col gap-8 isolate lg:flex-row">
            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
              <img src="https://images.unsplash.com/photo-1447624799968-c704f86dc931?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Berbagai Jenis Telur" class="absolute inset-0 object-cover w-full h-full rounded-2xl bg-gray-50">
              <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
            </div>
            <div>
              <div class="flex items-center text-xs gap-x-4">
                <time datetime="2024-07-26" class="text-gray-500">Jul 26, 2024</time>
                <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Info Produk</a>
              </div>
              <div class="relative max-w-xl group">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    Jenis-Jenis Telur yang Banyak Dibeli
                  </a>
                </h3>
                <p class="mt-5 text-sm leading-6 text-gray-600">Telur ayam adalah jenis telur yang paling banyak dibeli karena harganya yang terjangkau dan mudah ditemukan. Selain itu, telur bebek juga populer karena rasanya yang lebih kaya dan kandungan nutrisi yang tinggi. Telur puyuh, meski kecil, sangat bergizi dan sering digunakan dalam hidangan khas Asia.</p>
              </div>
              <div class="flex pt-6 mt-6 border-t border-gray-900/5">
                <div class="relative flex items-center gap-x-4">
                  <img src="https://images.unsplash.com/photo-1536816579748-4ecb3f03d72a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Jane Smith" class="w-10 h-10 rounded-full bg-gray-50">
                  <div class="text-sm leading-6">
                    <p class="font-semibold text-gray-900">
                      <a href="#">
                        <span class="absolute inset-0"></span>
                        Jane Smith
                      </a>
                    </p>
                    <p class="text-gray-600">Pakar Kuliner</p>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
@include('components.grosir.footer-grosir')
