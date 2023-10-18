<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf reservasi</title>

</head>
<body>
    <center>

        <h2>Puncak Golf</h2>
    </center>
        @foreach ($reservasi as $item)


            <p>Nomor Reservasi: {{@$item->no_reservasi}}</p>
                {{-- <span>Tanggal Reservasi:</span> {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }} <br> --}}

                <p>Nama Pemesan: {{$item->nama}}</p>

                <p>No. Telepon: {{$item->no_telp}}</p>

                <p>Email: {{$item->email}}</p>
                <b>DETAIL PESANAN</b> <br>

                <span>Nama Paket:</span> {{@$item->paket->nama}} <br>

    <span>Tanggal Reservasi:</span> {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }} <br>

                <span>Jam Mulai:</span>{{ \Carbon\Carbon::createFromFormat('H:i:s',@$item->paket->jam_mulai)->format('h:i A') }} <br>

                <span>Jam Selesai:</span> {{ \Carbon\Carbon::createFromFormat('H:i:s',@$item->paket->jam_selesai)->format('h:i A') }} <br>

                <span>Harga:</span> Rp.{{ number_format($item->harga, 0, ',', '.') }}
                <hr>
            <p>Total Harga: Rp.{{ number_format($item->harga,0,',','.') }}</p>
        @endforeach
</body>
</html>
