
    <div class="container my-5">
        <h2>Data Transaksi Donasi</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Judul Donasi</th>
                    <th>Jumlah Donasi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->donation->judul ?? 'Tidak diketahui' }}</td>
                        <td>{{ number_format($item->jumlah_donasi, 0, ',', '.') }}</td>
                       
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal untuk menampilkan gambar full -->
    

    <script>
       
        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }
    </script>
