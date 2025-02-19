<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<div class="relative flex size-full min-h-screen flex-col bg-[#FFFFFF] group/design-root overflow-x-hidden"
    style='font-family: "Public Sans", "Noto Sans", sans-serif;'>
    <div class="layout-container flex flex-col flex-grow">
        <!-- Header dan konten lainnya -->
        <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#F4F4F4] px-10 py-3 shadow-md">
                    <a href="/" class="flex items-center gap-4">
                    <div class="size-8">
                        <img src="{{ asset('image/logo.png') }}" alt="">
                    </div>
                    <h2 class="text-[#39E079] text-xl font-bold leading-tight tracking-[-0.015em]">DonasiKu</h2>
                    </a>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-[#141414] text-lg font-medium leading-normal" href="{{ route('about-us') }}">Tentang kami</a>
                        <a class="text-[#141414] text-lg font-medium leading-normal"
                            href="{{ route('donasi.transaksi') }}">Data Donasi</a>
                    </div>
                    @auth
                        <button
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#39E079] text-white text-lg font-bold leading-normal tracking-[0.015em]">
                            <span class="truncate">Sudah Login</span>
                        </button>
                    @else
                        <button
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#39E079] text-[#141414] text-lg font-bold leading-normal tracking-[0.015em]"
                            onclick="showAdminModal()">
                            <span class="truncate">Masuk</span>
                        </button>
                    @endauth
                </div>
            </header>
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Data Transaksi Donasi</h2>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-lg font-semibold text-gray-600 uppercase tracking-wider">
                                Nama
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-lg font-semibold text-gray-600 uppercase tracking-wider">
                                Nama Donasi
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-lg font-semibold text-gray-600 uppercase tracking-wider">
                                Jumlah Donasi
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-lg font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-lg font-semibold text-gray-600 uppercase tracking-wider">
                                Tanggal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->nama }}</p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $item->donation->judul ?? 'Tidak diketahui' }}</p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                                        <p class="text-gray-900 whitespace-no-wrap">Rp
                                                            {{ number_format($item->jumlah_donasi, 0, ',', '.') }}</p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                                        @php
                                                            $statusColor = [
                                                                'pending' => 'yellow',
                                                                'confirmed' => 'green',
                                                                'success' => 'green',
                                                                'failed' => 'red',
                                                            ][$item->status] ?? 'gray';
                                                        @endphp
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-{{ $statusColor }}-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-{{ $statusColor }}-200 opacity-50 rounded-full"></span>
                                                            <span class="relative">{{ ucfirst($item->status) }}</span>
                                                        </span>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-lg">
                                                        <p class="text-gray-900 whitespace-no-wrap">{{ $item->created_at->format('d M Y H:i') }}
                                                        </p>
                                                    </td>
                                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal untuk menampilkan gambar full -->
        <div id="imageModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-2xl w-full">
                <img id="modalImage" src="" alt="Full Size Image" class="w-full h-auto rounded">
                <button onclick="closeModal()"
                    class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tutup</button>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#39E079] text-[#141414] py-12 mt-auto">
            <div class="container mx-auto px-4">
                <!-- Konten footer -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Kolom 1: Tentang Kami -->
                    <div class="flex flex-col gap-6 text-justify justify-center items-center">
                        <h3 class="text-2xl font-bold">Tentang Kami</h3>
                        <p class="text-lg leading-relaxed">
                            DonasiKu adalah platform donasi yang membantu Anda untuk berdonasi secara cepat, tepat,
                            dan transparan. Kami berkomitmen untuk membantu mereka yang membutuhkan.
                        </p>
                    </div>

                    <!-- Kolom 2: Link Cepat -->
                    <div class="flex flex-col gap-6 text-start items-center">
                        <h3 class="text-2xl font-bold">Link Cepat</h3>
                        <ul class="flex flex-col gap-3">
                            <li><a href="#" class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Cara Kerja</a></li>
                            <li><a href="#" class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Data Donasi</a></li>
                            <li><a href="#" class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Kebijakan Privasi</a></li>
                            <li><a href="#" class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>

                    <!-- Kolom 3: Kontak Kami -->
                    <div class="flex flex-col gap-6 text-start items-center">
                        <h3 class="text-2xl font-bold">Kontak Kami</h3>
                        <ul class="flex flex-col gap-5">
                            <li class="text-lg flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path>
                                </svg>
                                info@donasiku.com
                            </li>
                            <li class="text-lg flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160C120,149.74,106.21,136,96,121.13l20.78-24.71.56-.75a16,16,0,0,0,1.4-15.17l-.06-.13L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47-20.67,24.74a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.26,18.93,27.77,37.55,46.46,46.46a16,16,0,0,0,15.7-1,6.13,6.13,0,0,0,.77-.57L168.86,152l47,.12a.61.61,0,0,0,.12,0A40.21,40.21,0,0,1,176,208Z"></path>
                                </svg>
                                +62 123 4567 890
                            </li>
                            <li class="text-lg flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,160Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0,254.19,254.19,0,0,0,41.37-38.3c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path>
                                </svg>
                                Jl. Donasi No. 123, Jakarta
                            </li>
                        </ul>
                    </div>

                    <!-- Kolom 4: Sosial Media -->
                    <div class="flex flex-col gap-6 text-start items-center">
                        <h3 class="text-xl font-bold">Sosial Media</h3>
                        <div class="flex gap-5">
                    <!-- Facebook -->
                    <a href="#" class="text-[#141414] hover:text-[#FFFFFF] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            viewBox="0 0 320 512">
                            <path
                                d="M279.14 288l14.22-92.66h-88.91V140.79c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S261.91 0 225.36 0C149.09 0 100.17 48.81 100.17 137.3v58.04H12v92.66h88.17V512h107.41V288z" />
                        </svg>
                    </a>

                    <!-- Twitter -->
                    <a href="#" class="text-[#141414] hover:text-[#FFFFFF] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.797-84.143-52.308-84.143-103.623v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.032-46.781-87.391 0-19.492 5.197-37.36 14.294-52.914 51.787 63.675 129.622 105.258 217.365 109.807-1.624-7.796-2.599-15.917-2.599-24.038 0-57.785 46.782-104.568 104.568-104.568 30.214 0 57.452 12.67 76.67 33.137 23.715-4.548 46.132-13.319 66.299-25.34-7.797 24.366-24.366 44.833-46.132 57.786 21.116-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                        </svg>
                    </a>

                    <!-- Instagram -->
                    <a href="#" class="text-[#141414] hover:text-[#FFFFFF] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z">
                            </path>
                        </svg>
                    </a>
                </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-[#FFFFFF] my-8"></div>

                <!-- Hak Cipta -->
                <div class="text-center text-lg">
                    <p>&copy; 2023 DonasiKu. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</div>