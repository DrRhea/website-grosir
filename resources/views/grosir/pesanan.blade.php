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

    <div class="relative isolate pt-14">
      <div class="bg-gray-50">
        <div class="max-w-2xl pt-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <div class="px-4 space-y-2 sm:flex sm:items-baseline sm:justify-between sm:space-y-0 sm:px-0">
            <div class="flex sm:items-baseline sm:space-x-4">
              <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Pesanan #54879</h1>
              <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:block">
                Lihat faktur
                <span aria-hidden="true"> →</span>
              </a>
            </div>
            <p class="text-sm text-gray-600">Pesanan dibuat <time datetime="2021-03-22" class="font-medium text-gray-900">22 Maret 2021</time></p>
            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:hidden">
              Lihat faktur
              <span aria-hidden="true"> →</span>
            </a>
          </div>
    
          <!-- Produk -->
          <div class="mt-6">
            <h2 class="sr-only">Produk yang dibeli</h2>
    
            <div class="space-y-8">
              <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border">
                  <div class="px-4 py-6 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                    <div class="sm:flex lg:col-span-7">
                      <div class="flex-shrink-0 w-full overflow-hidden rounded-lg aspect-h-1 aspect-w-1 sm:aspect-none sm:h-40 sm:w-40">
                        <img src="https://tailwindui.com/img/ecommerce-images/confirmation-page-03-product-01.jpg" alt="Botol isolasi dengan dasar putih dan tutup hitam." class="object-cover object-center w-full h-full sm:h-full sm:w-full">
                      </div>
    
                      <div class="mt-6 sm:ml-6 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-900">
                          <a href="#">Tumbler Nomad</a>
                        </h3>
                        <p class="mt-2 text-sm font-medium text-gray-900">$35.00</p>
                        <p class="mt-3 text-sm text-gray-500">Tumbler isolasi yang tahan lama dan portabel ini akan menjaga minuman Anda pada suhu yang sempurna selama petualangan Anda berikutnya.</p>
                      </div>
                    </div>
    
                    <div class="mt-6 lg:col-span-5 lg:mt-0">
                      <dl class="grid grid-cols-2 text-sm gap-x-6">
                        <div>
                          <dt class="font-medium text-gray-900">Alamat pengiriman</dt>
                          <dd class="mt-3 text-gray-500">
                            <span class="block">Floyd Miles</span>
                            <span class="block">7363 Cynthia Pass</span>
                            <span class="block">Toronto, ON N3Y 4H8</span>
                          </dd>
                        </div>
                        <div>
                          <dt class="font-medium text-gray-900">Pembaruan pengiriman</dt>
                          <dd class="mt-3 space-y-3 text-gray-500">
                            <p>f•••@example.com</p>
                            <p>1•••••••••40</p>
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                          </dd>
                        </div>
                      </dl>
                    </div>
                  </div>
    
                  <div class="px-4 py-6 border-t border-gray-200 sm:px-6 lg:p-8">
                    <h4 class="sr-only">Status</h4>
                    <p class="text-sm font-medium text-gray-900">Sedang dipersiapkan untuk dikirim pada <time datetime="2021-03-24">24 Maret 2021</time></p>
                    <div class="mt-6" aria-hidden="true">
                      <div class="overflow-hidden bg-gray-200 rounded-full">
                        <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((1 * 2 + 1) / 8 * 100%);"></div>
                      </div>
                      <div class="hidden grid-cols-4 mt-6 text-sm font-medium text-gray-600 sm:grid">
                        <div class="text-indigo-600">Pesanan dibuat</div>
                        <div class="text-center text-indigo-600">Diproses</div>
                        <div class="text-center ">Dikirim</div>
                        <div class="text-right ">Diterima</div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border">
                  <div class="px-4 py-6 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                    <div class="sm:flex lg:col-span-7">
                      <div class="flex-shrink-0 w-full overflow-hidden rounded-lg aspect-h-1 aspect-w-1 sm:aspect-none sm:h-40 sm:w-40">
                        <img src="https://tailwindui.com/img/ecommerce-images/confirmation-page-03-product-02.jpg" alt="Jam tangan dengan tali kulit hitam, wajah jam putih, jarum jam tipis, dan tanda waktu halus." class="object-cover object-center w-full h-full sm:h-full sm:w-full">
                      </div>
    
                      <div class="mt-6 sm:ml-6 sm:mt-0">
                        <h3 class="text-base font-medium text-gray-900">
                          <a href="#">Jam Tangan Minimalis</a>
                        </h3>
                        <p class="mt-2 text-sm font-medium text-gray-900">$149.00</p>
                        <p class="mt-3 text-sm text-gray-500">Jam tangan kontemporer ini memiliki tampilan minimalis dan komponen berkualitas tinggi.</p>
                      </div>
                    </div>
    
                    <div class="mt-6 lg:col-span-5 lg:mt-0">
                      <dl class="grid grid-cols-2 text-sm gap-x-6">
                        <div>
                          <dt class="font-medium text-gray-900">Alamat pengiriman</dt>
                          <dd class="mt-3 text-gray-500">
                            <span class="block">Floyd Miles</span>
                            <span class="block">7363 Cynthia Pass</span>
                            <span class="block">Toronto, ON N3Y 4H8</span>
                          </dd>
                        </div>
                        <div>
                          <dt class="font-medium text-gray-900">Pembaruan pengiriman</dt>
                          <dd class="mt-3 space-y-3 text-gray-500">
                            <p>f•••@example.com</p>
                            <p>1•••••••••40</p>
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                          </dd>
                        </div>
                      </dl>
                    </div>
                  </div>
    
                  <div class="px-4 py-6 border-t border-gray-200 sm:px-6 lg:p-8">
                    <h4 class="sr-only">Status</h4>
                    <p class="text-sm font-medium text-gray-900">Dikirim pada <time datetime="2021-03-23">23 Maret 2021</time></p>
                    <div class="mt-6" aria-hidden="true">
                      <div class="overflow-hidden bg-gray-200 rounded-full">
                        <div class="h-2 bg-indigo-600 rounded-full" style="width: calc((0 * 2 + 1) / 8 * 100%);"></div>
                      </div>
                      <div class="hidden grid-cols-4 mt-6 text-sm font-medium text-gray-600 sm:grid">
                        <div class="text-indigo-600">Pesanan dibuat</div>
                        <div class="text-center ">Diproses</div>
                        <div class="text-center ">Dikirim</div>
                        <div class="text-right ">Diterima</div>
                      </div>
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
    
          <!-- Penagihan -->
          <div class="mt-16">
            <h2 class="sr-only">Ringkasan Penagihan</h2>
    
            <div class="px-4 py-6 bg-gray-100 sm:rounded-lg sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8 lg:py-8">
              <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                <div>
                  <dt class="font-medium text-gray-900">Subtotal</dt>
                  <dd class="mt-3 text-gray-500">$184.00</dd>
                </div>
                <div>
                  <dt class="font-medium text-gray-900">Biaya Pengiriman</dt>
                  <dd class="mt-3 text-gray-500">$5.00</dd>
                </div>
                <div class="col-span-2">
                  <dt class="font-medium text-gray-900">Total</dt>
                  <dd class="mt-3 text-gray-500">$189.00</dd>
                </div>
              </dl>
    
              <div class="mt-6 lg:col-span-5 lg:mt-0">
                <p class="text-sm font-medium text-gray-900">Dikenakan pajak dan biaya tambahan dapat berlaku</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div>
</div>

@include('components.grosir.footer')
</body>
</html>