<!DOCTYPE html>
<html>
<head>
    <title>pdf reservasi</title>
    <style>
        /* Gaya CSS untuk nota reservasi tempat */
        .nota-reservasi {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .nota-reservasi h2 {
            margin-top: 10px;
        }

        .nomor-reservasi {
            font-weight: bold;
            margin-top: 10px;
        }

        .detail-reservasi {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-top: 20px; /* Menambahkan sedikit jarak di sini */
        }

        .detail-reservasi-item {
            margin-bottom: 10px;
            text-align: left;
        }

        .detail-reservasi-label {
            font-weight: bold;
        }

        .horizontal-line {
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }

        .total {
            margin-top: 10px;
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="nota-reservasi">
        <h2>Puncak Golf</h2>
        <div class="nomor-reservasi">
            <p>Nomor Reservasi: {{@$reservasi->no_reservasi}}</p>
        </div>
        <div class="detail-reservasi">
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">Tanggal Reservasi:</span> {{ \Carbon\Carbon::parse($reservasi->tanggal)->format('d F Y') }}
            </div>
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">Nama Pemesan:</span> {{$reservasi->nama}}
            </div>
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">No. Telepon:</span> {{$reservasi->no_telp}}
            </div>
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">Email:</span> {{$reservasi->email}}
            </div>
        </div>

        <div class="horizontal-line"></div>

        <div class="detail-reservasi">
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">Nama Paket:</span> {{@$reservasi->paket->nama}}
            </div>
            <div class="detail-reservasi-item">
                @if ($reservasi->tanggal)
    <span class="detail-reservasi-label">Tanggal Reservasi:</span> {{ \Carbon\Carbon::parse($reservasi->tanggal)->format('d F Y') }}
@endif
            </div>
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">Jam Mulai:</span><td>{{ \Carbon\Carbon::createFromFormat('H:i:s',@$reservasi->paket->jam_mulai)->format('h:i A') }}</td>
            </div>
            <div class="detail-reservasi-item">
                <span class="detail-reservasi-label">Jam Selesai:</span> <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',@$reservasi->paket->jam_selesai)->format('h:i A') }}</td>
            </div>
            <div class="detail-reservasi-item">
                @if (is_numeric($reservasi->harga))
                <span class="detail-reservasi-label">Total Harga:</span> Rp.{{ number_format($reservasi->harga, 0, ',', '.') }}
            @endif
            </div>
        </div>

        <div class="horizontal-line"></div>

        <div class="total">
            <p>Total Harga: Rp.{{ number_format($reservasi->harga,0,',','.') }}</p>
        </div>
    </div>
</body>
</html>
