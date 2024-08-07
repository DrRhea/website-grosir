<!doctype html>
<html lang="id" class="h-full bg-gray-50">
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
      <div class="bg-white">
        <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:px-0">
          <h1 class="text-3xl font-bold tracking-tight text-center text-gray-900 sm:text-4xl">Keranjang Belanja</h1>

          <form class="mt-12">
            <section aria-labelledby="cart-heading">
              <h2 id="cart-heading" class="sr-only">Item dalam keranjang belanja Anda</h2>

              <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                <li class="flex py-6">
                  <div class="flex-shrink-0">
                    <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-03-product-04.jpg" alt="Bagian depan kaos katun mint dengan pola garis bergelombang." class="object-cover object-center w-24 h-24 rounded-md sm:h-32 sm:w-32">
                  </div>

                  <div class="flex flex-col flex-1 ml-4 sm:ml-6">
                    <div>
                      <div class="flex justify-between">
                        <h4 class="text-sm">
                          <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Kaos Artwork</a>
                        </h4>
                        <p class="ml-4 text-sm font-medium text-gray-900">$32.00</p>
                      </div>
                      <p class="mt-1 text-sm text-gray-500">Mint</p>
                      <p class="mt-1 text-sm text-gray-500">Medium</p>
                    </div>
                  </div>
                </li>
              </ul>
            </section>

            <!-- Ringkasan Pesanan -->
            <section aria-labelledby="summary-heading" class="mt-10">
              <h2 id="summary-heading" class="sr-only">Ringkasan Pesanan</h2>

              <div>
                <dl class="space-y-4">
                  <div class="flex items-center justify-between">
                    <dt class="text-base font-medium text-gray-900">Subtotal</dt>
                    <dd class="ml-4 text-base font-medium text-gray-900">$96.00</dd>
                  </div>
                </dl>
                <p class="mt-1 text-sm text-gray-500">Pengiriman dan pajak akan dihitung saat checkout.</p>
              </div>

              <div class="mt-10">
                <button type="submit" class="w-full px-4 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Bayar Sekarang</button>
              </div>

              <div class="mt-6 text-sm text-center">
                <p>
                  atau
                  <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Lanjutkan Belanja
                    <span aria-hidden="true"> →</span>
                  </a>
                </p>
              </div>
            </section>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include('components.grosir.footer')
</body>
</html>
