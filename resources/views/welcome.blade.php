<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Aplikasi Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Aplikasi Donasi</h1>
            
        </div>
    </header>

    <main class="container mx-auto py-8">
        <secticlass="text-center py-16 bg-blue-100 mb-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-blue-600">Selamat datang di Aplikasi Donasi</h2>
            <p class="text-lg mt-4 text-gray-700">Bergabunglah bersama kami untuk membantu proyek sosial yang lebih baik.</p>
            <a href="{{ route('donasi.transaksi') }}" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-full text-lg">Data Transaksi</a>
        </secticlass=>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($donations as $donation)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
                <img class="w-full h-48 object-cover rounded-lg mb-4" src="{{ asset('storage/' . $donation->image) }}" alt="Donasi Image">
                <h3 class="text-xl font-semibold text-blue-600">{{ $donation->judul }}</h3>
                <p class="mt-2 text-gray-700">{{ Str::limit($donation->deskripsi, 100) }}</p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-gray-600">Target: Rp {{ number_format($donation->target_donasi, 2, ',', '.') }}</span>
                    <span class="text-gray-600">Terkumpul: Rp  {{ number_format($donation->jumlah_terkumpul, 2, ',', '.') }}</span>
                    <button onclick="openModal({{ $donation->id }})" class="px-4 py-2 bg-blue-600 text-white rounded-full">Donasi</button>
                </div>
            </div>
            @endforeach
        </section>

        <!-- Modal Form -->
        <div id="donationModal" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold mb-4">Donasi untuk Proyek</h3>
                <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="donation_id" id="donation_id">
                    <div class="mb-4">
                        <label for="nama" class="block text-lg">Nama:</label>
                        <input type="text" name="nama" required class="w-full p-3 border border-gray-300 rounded-lg mt-2">
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_donasi" class="block text-lg">Jumlah Donasi:</label>
                        <input type="number" name="jumlah_donasi" required class="w-full p-3 border border-gray-300 rounded-lg mt-2">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-lg">Bukti Transfer:</label>
                        <input type="file" name="image" accept="image/*" required class="w-full p-3 border border-gray-300 rounded-lg mt-2">
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-full">Kirim Donasi</button>
                        <button type="button" onclick="closeModal()" class="px-6 py-2 bg-gray-400 text-white rounded-full">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function openModal(donationId) {
            document.getElementById('donation_id').value = donationId;
            document.getElementById('donationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('donationModal').style.display = 'none';
        }
    </script>
</body>

</html>
