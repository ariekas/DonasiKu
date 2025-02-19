<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" as="style" onload="this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Public+Sans%3Awght%40400%3B500%3B700%3B900" />

    <title>DonasiKu</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
    <div class="relative flex size-full min-h-screen flex-col bg-[#FFFFFF] group/design-root overflow-x-hidden"
        style='font-family: "Public Sans", "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#F4F4F4] px-10 py-3 shadow-md">
                <div class="flex items-center gap-4 text-[#141414]">
                    <div class="size-8">
                        <img src="{{ asset('image/logo.png') }}" alt="">
                    </div>
                    <h2 class="text-[#39E079] text-xl font-bold leading-tight tracking-[-0.015em]">DonasiKu</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-[#141414] text-lg font-medium leading-normal" href="#">Cara Kerja</a>
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
            <div class="px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col  flex-1">
                    <div class="@container">
                        <div class="@[480px]:p-4">
                            <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-start justify-end px-4 pb-10 @[480px]:px-10"
                                style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://cdn.usegalileo.ai/sdxl10/fe932674-2857-4cee-a820-0f03b875aa3a.png"); background-size: cover;'>
                                <div class="flex flex-col gap-2 text-left">
                                    <h1
                                        class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                        Berdonasi Secara Cepat, Tepat, dan Transparan Maka Donasi Sekarang dan Bantu
                                        Mereka yang Membutuhkan
                                    </h1>
                                    <h2
                                        class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                                        Bergerak Untuk Membantu Yang Membutuhkan
                                    </h2>
                                </div>
                                <label class="flex flex-col min-w-40 h-14 w-full max-w-[480px] @[480px]:h-16">
                                    <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                                        <div class="text-neutral-500 flex border border-[#E0E0E0] bg-[#FFFFFF] items-center justify-center pl-[15px] rounded-l-xl border-r-0"
                                            data-icon="MagnifyingGlass" data-size="20px" data-weight="regular">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                fill="currentColor" viewBox="0 0 256 256">
                                                <path
                                                    d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input placeholder="Cari Donasi Yang Kamu Cari"
                                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#141414] focus:outline-0 focus:ring-0 border border-[#E0E0E0] bg-[#FFFFFF] focus:border-[#E0E0E0] h-full placeholder:text-neutral-500 px-[15px] rounded-r-none border-r-0 pr-2 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal"
                                            value="" />
                                        <div
                                            class="flex items-center justify-center rounded-r-xl border-l-0 border border-[#E0E0E0] bg-[#FFFFFF] pr-[7px]">
                                            <button
                                                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#39E079] text-[#141414] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
                                                <span class="truncate">Cari</span>
                                            </button>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-10 px-4 py-10 @container">
                        <h1
                            class="text-[#141414] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">
                            Apa yang kami tawarkan untuk memudahkan berdonasi
                        </h1>
                        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-0">
                            <div class="flex flex-1 gap-3 rounded-lg border border-[#E0E0E0] bg-[#FFFFFF] p-4 flex-col">
                                <div class="text-[#141414]" data-icon="HandHeart" data-size="24px"
                                    data-weight="regular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#141414] text-base font-bold leading-tight">Tepat Sasaran</h2>
                                    <p class="text-neutral-500 text-sm font-normal leading-normal">Donasi yang di terima
                                        akan di berikan kepada korban atau orang yang tepat sasaran</p>
                                </div>
                            </div>
                            <div class="flex flex-1 gap-3 rounded-lg border border-[#E0E0E0] bg-[#FFFFFF] p-4 flex-col">
                                <div class="text-[#141414]" data-icon="List" data-size="24px" data-weight="regular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#141414] text-base font-bold leading-tight">Data Donasi Terbuka
                                    </h2>
                                    <p class="text-neutral-500 text-sm font-normal leading-normal">Data donasi yang di
                                        berikan akan terbuka untuk semua orang</p>
                                </div>
                            </div>
                            <div class="flex flex-1 gap-3 rounded-lg border border-[#E0E0E0] bg-[#FFFFFF] p-4 flex-col">
                                <div class="text-[#141414]" data-icon="Users" data-size="24px" data-weight="regular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#141414] text-base font-bold leading-tight">Donasi Cepat</h2>
                                    <p class="text-neutral-500 text-sm font-normal leading-normal">Pergerakan
                                        kemanusiaan akan di lakukan secepat mungkin, dibantu banyak orang agar donasi
                                        cepat tersalurkan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="text-[#141414] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 ">
                        Berbagai Tempat Berdonasi</h2>
                    <div
                        class="flex overflow-x-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        <div class="flex items-stretch p-4 gap-4">
                            <!-- Card 1 -->
                            @foreach($donations as $donation)


                                                        <div
                                                            class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-[250px] bg-white shadow-lg p-4">
                                                            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl"
                                                                style='background-image: url("{{ asset('storage/' . $donation->image) }}");'>
                                                            </div>
                                                            <div>
                                                                <p class="text-[#141414] text-base font-medium leading-normal">
                                                                    {{ $donation->judul }}
                                                                </p>
                                                                <p class="text-neutral-500 text-sm font-normal leading-normal max-w-sm">
                                                                    {{ Str::limit($donation->deskripsi, 100) }}
                                                                </p>
                                                            </div>

                                                            @php
                                                                $percentage = min(100, ($donation->jumlah_terkumpul / $donation->target_donasi) * 100);
                                                            @endphp
                                                            <div class="mt-2">
                                                                <div class="w-full bg-gray-300 rounded-full h-2.5">
                                                                    <div class="h-2.5 rounded-full"
                                                                        style="width: {{ $percentage }}%; background-color: #39E079;">
                                                                    </div>
                                                                </div>
                                                                <div class="flex justify-between text-sm mt-2">

                                                                    <span>Terkumpul: Rp
                                                                        {{ number_format($donation->jumlah_terkumpul, 2, ',', '.') }}</span>
                                                                    <span>Target:
                                                                        Rp{{ number_format($donation->target_donasi, 2, ',', '.') }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-3 gap-2 mt-5">
                                                                <button class="text-black rounded-lg py-2 px-4 hover:opacity-90"
                                                                    style="background-color: #39E079;"
                                                                    onclick="openModal({{ $donation->id }})">Donasi</button>
                                                                <a href="{{ route('detail_donasi', $donation->id) }}"
                                                                    class="text-black rounded-lg py-2 px-4 hover:opacity-90 text-center"
                                                                    style="background-color: #39E079;">Detail</a>
                                                                <button class="text-black rounded-lg py-2 px-4 hover:opacity-90"
                                                                    style="background-color: #39E079;">Dokumentasi</button>
                                                            </div>
                                                        </div>
                            @endforeach
                            <div id="donationModal" style="display: none;"
                                class="fixed inset-0 z-50 flex items-center justify-center">
                                <div class="absolute inset-0 bg-black opacity-50" onclick="closeModal()"></div>
                                <div
                                    class="relative w-full max-w-lg p-6 bg-white rounded-lg shadow-lg transform transition-all duration-300 ease-in-out scale-95">
                                    <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Donasi untuk Proyek
                                    </h3>
                                    <form action="{{ route('donation.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="donation_id" id="donation_id">
                                        <div class="mb-4">
                                            <label for="nama"
                                                class="block text-lg font-medium text-gray-700">Nama:</label>
                                            <input type="text" name="nama" required
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#39E079]">
                                        </div>
                                        <div class="mb-4">
                                            <label for="jumlah_donasi"
                                                class="block text-lg font-medium text-gray-700">Jumlah Donasi:</label>
                                            <input type="number" name="jumlah_donasi" required
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#39E079]">
                                        </div>
                                        <div class="mb-4">
                                            <label for="image" class="block text-lg font-medium text-gray-700">Bukti
                                                Transfer:</label>
                                            <input type="file" name="image" accept="image/*" required
                                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#39E079]">
                                        </div>
                                        <div class="flex justify-between gap-4">
                                            <button type="submit"
                                                class="w-full py-2 bg-[#39E079] text-white rounded-lg hover:bg-[#2ecc71] transition ease-in-out duration-300">Kirim
                                                Donasi</button>
                                            <button type="button" onclick="closeModal()"
                                                class="w-full py-2 bg-red-400 text-white rounded-lg hover:bg-red-500 transition ease-in-out duration-300">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-[#39E079] text-[#141414] py-12 mt-10">
                <div class="container mx-auto px-4">
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
                        <div class="flex flex-col gap-6 text-start  items-center">
                            <h3 class="text-2xl font-bold">Link Cepat</h3>
                            <ul class="flex flex-col gap-3">
                                <li><a href="#"
                                        class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Cara
                                        Kerja</a></li>
                                <li><a href="#"
                                        class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Data
                                        Donasi</a></li>
                                <li><a href="#"
                                        class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Kebijakan
                                        Privasi</a></li>
                                <li><a href="#"
                                        class="text-lg hover:underline hover:text-[#FFFFFF] transition duration-300">Syarat
                                        & Ketentuan</a></li>
                            </ul>
                        </div>

                        <!-- Kolom 3: Kontak Kami -->
                        <div class="flex flex-col gap-6 text-start  items-center">
                            <h3 class="text-2xl font-bold">Kontak Kami</h3>
                            <ul class="flex flex-col gap-5">
                                <li class="text-lg flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z">
                                        </path>
                                    </svg>
                                    info@donasiku.com
                                </li>
                                <li class="text-lg flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160C120,149.74,106.21,136,96,121.13l20.78-24.71.56-.75a16,16,0,0,0,1.4-15.17l-.06-.13L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47-20.67,24.74a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.26,18.93,27.77,37.55,46.46,46.46a16,16,0,0,0,15.7-1,6.13,6.13,0,0,0,.77-.57L168.86,152l47,.12a.61.61,0,0,0,.12,0A40.21,40.21,0,0,1,176,208Z">
                                        </path>
                                    </svg>
                                    +62 123 4567 890
                                </li>
                                <li class="text-lg flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0,254.19,254.19,0,0,0,41.37-38.3c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z">
                                        </path>
                                    </svg>
                                    Jl. Donasi No. 123, Jakarta
                                </li>
                            </ul>
                        </div>

                        <!-- Kolom 4: Sosial Media -->
                        <div class="flex flex-col gap-6 text-start  items-center">
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
    <script>
        function showAdminModal() {
                window.location.href = '/admin/login';
        }
        function openModal(donationId) {
            document.getElementById('donation_id').value = donationId;
            document.getElementById('donationModal').style.display = 'flex';
            const modal = document.getElementById('donationModal');
            modal.style.display = 'flex';
            modal.classList.remove('scale-95');
            modal.classList.add('scale-100');
        }

        function closeModal() {
            document.getElementById('donationModal').style.display = 'none';
            const modal = document.getElementById('donationModal');
            modal.classList.remove('scale-100');
            modal.classList.add('scale-95');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }
    </script>
</body>

</html>