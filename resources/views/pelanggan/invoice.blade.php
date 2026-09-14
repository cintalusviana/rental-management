<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Penyewaan</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            font-family:'Courier New', monospace;
            background:#ececec;
            padding:30px;

        }

        .receipt{

            width:380px;
            margin:auto;
            background:#fff;
            padding:20px;
            color:#000;
            border:1px solid #ccc;

        }

        .center{

            text-align:center;

        }

        .title{

            font-size:22px;
            font-weight:bold;
            text-transform:uppercase;

        }

        .sub{

            font-size:13px;
            margin-top:5px;
            color:#555;

        }

        hr{

            border:none;
            border-top:1px dashed #000;
            margin:12px 0;

        }

        table{

            width:100%;
            border-collapse:collapse;

        }

        td{

            padding:4px 0;
            vertical-align:top;

        }

        .right{

            text-align:right;

        }

        .bold{

            font-weight:bold;

        }

        .small{

            font-size:12px;

        }

        .item-name{

            font-weight:bold;

        }

        .footer{

            text-align:center;
            margin-top:20px;
            font-size:12px;

        }

        .status{

            text-align:center;
            margin-top:15px;
            font-weight:bold;
            font-size:15px;

        }

    </style>

</head>

<body>

<div class="receipt">

    <div class="center">

        <div class="title">

            MANAGEMENT SISTEM RENTAL

        </div>

        <div class="sub">

            Bukti Penyewaan Barang

        </div>

    </div>

    <hr>

    <table>

        <tr>
            <td>No Invoice</td>
            <td class="right">{{ $rental->rental_code }}</td>
        </tr>

        <tr>
            <td>Tanggal</td>
            <td class="right">
                {{ now()->format('d-m-Y H:i') }}
            </td>
        </tr>

    </table>

    <hr>

    <table>

        <tr>
            <td>Nama</td>
            <td class="right">
                {{ $rental->customer->name }}
            </td>
        </tr>

        <tr>
            <td>No HP</td>
            <td class="right">
                {{ $rental->customer->phone ?? '-' }}
            </td>
        </tr>

        <tr>
            <td>Tgl Sewa</td>
            <td class="right">
                {{ \Carbon\Carbon::parse($rental->rental_date)->format('d/m/Y') }}
            </td>
        </tr>

        <tr>
            <td>Kembali</td>
            <td class="right">
                {{ \Carbon\Carbon::parse($rental->return_date)->format('d/m/Y') }}
            </td>
        </tr>

        <tr>
            <td>Lama</td>
            <td class="right">
                {{ \Carbon\Carbon::parse($rental->rental_date)->diffInDays($rental->return_date)+1 }}
                Hari
            </td>
        </tr>

    </table>

    <hr>

    @foreach($rental->details as $detail)

        <div class="item-name">

            {{ $detail->product->name }}

        </div>

        <table class="small">

            <tr>

                <td>

                    {{ $detail->quantity }} x
                    Rp {{ number_format($detail->price,0,',','.') }}

                </td>

                <td class="right">

                    Rp {{ number_format($detail->subtotal,0,',','.') }}

                </td>

            </tr>

        </table>

    @endforeach

    <hr>

    <table>

        <tr>

            <td>Subtotal</td>

            <td class="right">

                Rp {{ number_format($rental->total_price,0,',','.') }}

            </td>

        </tr>

        <tr class="bold">

            <td>TOTAL</td>

            <td class="right">

                Rp {{ number_format($rental->total_price,0,',','.') }}

            </td>

        </tr>

    </table>

    <hr>

    <div class="status">

        STATUS :
        @if($rental->payments->count())

            {{ strtoupper($rental->payments->sortByDesc('id')->first()->payment_status) }}

        @else

            BELUM BAYAR

        @endif

    </div>

    <hr>

    <div class="footer">

        Terima kasih telah melakukan penyewaan.<br>

        Simpan struk ini sebagai bukti transaksi.<br><br>

        <b>MANAGEMENT SISTEM RENTAL</b><br>

        © {{ date('Y') }}

    </div>

</div>

</body>
</html>