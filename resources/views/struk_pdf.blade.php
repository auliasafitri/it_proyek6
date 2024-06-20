<!DOCTYPE html>
<html>
<head>
    <title>Struk Transaksi</title>
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
    <h2>Struk Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $total = 0;
            @endphp
            @foreach ($struk as $dp)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dp->nama_barang }}</td>
                    <td>Rp{{ number_format($dp->harga, 0, ",", ".") }}</td>
                    <td>{{ $dp->jumlah_barang }}</td>
                    <td>Rp{{ number_format($dp->jumlah_barang * $dp->harga, 0, ",", ".") }}</td>
                </tr>
                @php
                    $total += ($dp->jumlah_barang * $dp->harga);
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th>Rp{{ number_format($total, 0, ",", ".") }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
