<!DOCTYPE html>
<html>
<head>
    <title>Rekap Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Rekap Transaksi dari {{ $tanggal_dari }} sampai {{ $tanggal_sampai }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah Barang</th>
                <th>Sub Total</th>
            </tr>
            
        </thead>
        <tbody>
            @php
                $no = 1;
                $total=0;
            @endphp
            @foreach ($transaksi as $tr)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ date('d-m-Y', strtotime($tr->tanggal)) }}</td>
                    <td>{{ $tr->nama_barang }}</td>
                    <td>Rp{{ number_format($tr->harga, 0, ",", ".") }}</td>
                    <td>{{ $tr->jumlah_barang }}</td>
                    <td>Rp{{ number_format($subtotal=$tr->harga*$tr->jumlah_barang, 0, ",", ".") }}</td>
                </tr>
                @php
                    $total+=$subtotal;
                @endphp
            @endforeach
            <tr>
                <th colspan="5">Total :</th>
                <th>Rp{{ number_format($total, 0, ",", ".") }}</th>
            </tr>
        </tbody>
    </table>
</body>
</html>
