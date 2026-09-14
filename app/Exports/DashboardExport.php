<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Rental;
use App\Models\Payment;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class DashboardExport implements
    FromCollection,
    WithTitle,
    WithStyles,
    WithColumnWidths,
    WithEvents
{
    protected $startDate;
    protected $endDate;

    public function __construct(
        $startDate = null,
        $endDate = null
    ) {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }


    /**
     * =====================================================
     * DATA EXCEL
     * =====================================================
     */
    public function collection()
    {
        $data = new Collection();


        /*
        |--------------------------------------------------------------------------
        | FILTER PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $paymentQuery = Payment::where(
            'payment_status',
            'Lunas'
        );

        if ($this->startDate && $this->endDate) {

            $paymentQuery->whereBetween(
                'payment_date',
                [
                    $this->startDate,
                    $this->endDate
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL DATA
        |--------------------------------------------------------------------------
        */

        $totalProducts = Product::count();

        $totalCustomers = Customer::count();

        $totalRentals = Rental::count();

        $totalCategories = Category::count();

        $availableProducts = Product::where(
            'stock',
            '>',
            0
        )->count();

        $totalIncome = (clone $paymentQuery)
            ->sum('amount');

        $transactionVolume = (clone $paymentQuery)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | HEADER
        |--------------------------------------------------------------------------
        */

        $data->push([
            'RENTAL MANAGEMENT'
        ]);

        $data->push([
            'Dashboard Ringkasan'
        ]);

        $data->push([
            'Periode',
            $this->periode()
        ]);

        $data->push([
            ''
        ]);


        /*
        |--------------------------------------------------------------------------
        | RINGKASAN
        |--------------------------------------------------------------------------
        */

        $data->push([
            'RINGKASAN DASHBOARD'
        ]);

        $data->push([
            'Total Barang',
            $totalProducts,
            'Total Pelanggan',
            $totalCustomers
        ]);

        $data->push([
            'Total Penyewaan',
            $totalRentals,
            'Total Kategori',
            $totalCategories
        ]);

        $data->push([
            'Barang Tersedia',
            $availableProducts,
            'Volume Transaksi',
            $transactionVolume
        ]);

        $data->push([
            'Total Pendapatan',
            'Rp ' . number_format(
                $totalIncome,
                0,
                ',',
                '.'
            )
        ]);

        $data->push([
            ''
        ]);


        /*
        |--------------------------------------------------------------------------
        | PENDAPATAN BULANAN
        |--------------------------------------------------------------------------
        */

        $monthlyIncome = Payment::selectRaw("
                MONTH(payment_date) as month,
                SUM(amount) as total
            ")
            ->where(
                'payment_status',
                'Lunas'
            )
            ->whereYear(
                'payment_date',
                now()->year
            )
            ->groupByRaw(
                'MONTH(payment_date)'
            )
            ->orderByRaw(
                'MONTH(payment_date)'
            )
            ->get();


        $data->push([
            'PENDAPATAN BULANAN'
        ]);

        $data->push([
            'Bulan',
            'Pendapatan'
        ]);


        foreach ($monthlyIncome as $item) {

            $data->push([
                $this->namaBulan(
                    $item->month
                ),

                'Rp ' . number_format(
                    $item->total,
                    0,
                    ',',
                    '.'
                )
            ]);
        }


        $data->push([
            ''
        ]);


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI BULANAN
        |--------------------------------------------------------------------------
        */

        $monthlyTransaction = Payment::selectRaw("
                MONTH(payment_date) as month,
                COUNT(id) as total
            ")
            ->where(
                'payment_status',
                'Lunas'
            )
            ->whereYear(
                'payment_date',
                now()->year
            )
            ->groupByRaw(
                'MONTH(payment_date)'
            )
            ->orderByRaw(
                'MONTH(payment_date)'
            )
            ->get();


        $data->push([
            'TRANSAKSI BULANAN'
        ]);

        $data->push([
            'Bulan',
            'Jumlah Transaksi'
        ]);


        foreach ($monthlyTransaction as $item) {

            $data->push([
                $this->namaBulan(
                    $item->month
                ),

                $item->total
            ]);
        }


        $data->push([
            ''
        ]);


        /*
        |--------------------------------------------------------------------------
        | RENTAL TERBARU
        |--------------------------------------------------------------------------
        */

        $rentalQuery = Rental::with(
            'customer'
        );

        if ($this->startDate && $this->endDate) {

            $rentalQuery->whereBetween(
                'rental_date',
                [
                    $this->startDate,
                    $this->endDate
                ]
            );
        }


        $rentals = $rentalQuery
            ->latest('rental_date')
            ->take(10)
            ->get();


        $data->push([
            'RENTAL TERBARU'
        ]);

        $data->push([
            'No',
            'Kode Rental',
            'Pelanggan',
            'Tanggal Sewa',
            'Tanggal Kembali',
            'Total',
            'Status'
        ]);


        foreach ($rentals as $index => $rental) {

            $data->push([

                $index + 1,

                $rental->rental_code ?? '-',

                $rental->customer->name ?? '-',

                $rental->rental_date
                    ? date(
                        'd/m/Y',
                        strtotime(
                            $rental->rental_date
                        )
                    )
                    : '-',

                $rental->return_date
                    ? date(
                        'd/m/Y',
                        strtotime(
                            $rental->return_date
                        )
                    )
                    : '-',

                'Rp ' . number_format(
                    $rental->total_price ?? 0,
                    0,
                    ',',
                    '.'
                ),

                $this->statusIndonesia(
                    $rental->status
                )
            ]);
        }


        $data->push([
            ''
        ]);


        /*
        |--------------------------------------------------------------------------
        | STOK RENDAH
        |--------------------------------------------------------------------------
        */

        $lowStock = Product::where(
            'stock',
            '<=',
            5
        )
            ->orderBy(
                'stock',
                'asc'
            )
            ->take(10)
            ->get();


        $data->push([
            'STOK BARANG RENDAH'
        ]);

        $data->push([
            'No',
            'Nama Barang',
            'Stok',
            'Status'
        ]);


        foreach ($lowStock as $index => $product) {

            $data->push([

                $index + 1,

                $product->name ?? '-',

                $product->stock ?? 0,

                $product->stock <= 0
                    ? 'Habis'
                    : 'Stok Menipis'
            ]);
        }


        return $data;
    }


    /**
     * =====================================================
     * NAMA BULAN INDONESIA
     * =====================================================
     */
    private function namaBulan($bulan)
    {
        $bulanIndonesia = [

            1  => 'Januari',
            2  => 'Februari',
            3  => 'Maret',
            4  => 'April',
            5  => 'Mei',
            6  => 'Juni',
            7  => 'Juli',
            8  => 'Agustus',
            9  => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',

        ];

        return $bulanIndonesia[(int) $bulan] ?? '-';
    }


    /**
     * =====================================================
     * TERJEMAH STATUS RENTAL
     * =====================================================
     */
    private function statusIndonesia($status)
    {
        $status = strtolower(
            trim(
                (string) $status
            )
        );

        return match ($status) {

            'pending' => 'Menunggu',

            'process',
            'processing' => 'Diproses',

            'active' => 'Sedang Berjalan',

            'confirmed' => 'Dikonfirmasi',

            'completed' => 'Selesai',

            'cancelled',
            'canceled' => 'Dibatalkan',

            'returned' => 'Dikembalikan',

            default => ucfirst(
                $status ?: '-'
            ),

        };
    }


    /**
     * =====================================================
     * PERIODE
     * =====================================================
     */
    private function periode()
    {
        if (
            $this->startDate &&
            $this->endDate
        ) {

            return date(
                'd/m/Y',
                strtotime(
                    $this->startDate
                )
            )
            . ' - ' .
            date(
                'd/m/Y',
                strtotime(
                    $this->endDate
                )
            );
        }

        return 'Semua Periode';
    }


    /**
     * =====================================================
     * STYLE
     * =====================================================
     */
    public function styles(
        Worksheet $sheet
    ) {
        return [

            /*
            |--------------------------------------------------------------------------
            | JUDUL
            |--------------------------------------------------------------------------
            */

            1 => [

                'font' => [

                    'bold' => true,

                    'size' => 20,

                    'color' => [
                        'rgb' => 'FFFFFF'
                    ],

                ],

                'fill' => [

                    'fillType' => Fill::FILL_SOLID,

                    'color' => [
                        'rgb' => '2563EB'
                    ],

                ],

                'alignment' => [

                    'horizontal' =>
                        Alignment::HORIZONTAL_LEFT,

                    'vertical' =>
                        Alignment::VERTICAL_CENTER,

                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | SUBJUDUL
            |--------------------------------------------------------------------------
            */

            2 => [

                'font' => [

                    'bold' => true,

                    'size' => 12,

                    'color' => [
                        'rgb' => '475569'
                    ],

                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | PERIODE
            |--------------------------------------------------------------------------
            */

            3 => [

                'font' => [

                    'size' => 10,

                    'color' => [
                        'rgb' => '64748B'
                    ],

                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | SECTION
            |--------------------------------------------------------------------------
            */

            5 => [

                'font' => [

                    'bold' => true,

                    'size' => 12,

                    'color' => [
                        'rgb' => 'FFFFFF'
                    ],

                ],

                'fill' => [

                    'fillType' => Fill::FILL_SOLID,

                    'color' => [
                        'rgb' => '1D4ED8'
                    ],

                ],

            ],

        ];
    }


    /**
     * =====================================================
     * EVENT SETELAH SHEET
     * =====================================================
     */
    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (
                AfterSheet $event
            ) {

                $sheet = $event->sheet
                    ->getDelegate();

                $lastRow =
                    $sheet->getHighestRow();


                /*
                |--------------------------------------------------------------------------
                | MERGE JUDUL
                |--------------------------------------------------------------------------
                */

                $sheet->mergeCells(
                    'A1:G1'
                );

                $sheet->mergeCells(
                    'A2:G2'
                );

                $sheet->mergeCells(
                    'A5:G5'
                );


                /*
                |--------------------------------------------------------------------------
                | TINGGI BARIS
                |--------------------------------------------------------------------------
                */

                $sheet
                    ->getRowDimension(1)
                    ->setRowHeight(32);

                $sheet
                    ->getRowDimension(2)
                    ->setRowHeight(22);


                /*
                |--------------------------------------------------------------------------
                | STYLE SEMUA DATA
                |--------------------------------------------------------------------------
                */

                $sheet
                    ->getStyle(
                        'A1:G' . $lastRow
                    )
                    ->getAlignment()
                    ->setVertical(
                        Alignment::VERTICAL_CENTER
                    );


                /*
                |--------------------------------------------------------------------------
                | BORDER
                |--------------------------------------------------------------------------
                */

                $sheet
                    ->getStyle(
                        'A1:G' . $lastRow
                    )
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(
                        Border::BORDER_THIN
                    );


                /*
                |--------------------------------------------------------------------------
                | FREEZE
                |--------------------------------------------------------------------------
                */

                $sheet->freezePane(
                    'A6'
                );


                /*
                |--------------------------------------------------------------------------
                | LEBAR KOLOM
                |--------------------------------------------------------------------------
                */

                $sheet
                    ->getColumnDimension('A')
                    ->setWidth(18);

                $sheet
                    ->getColumnDimension('B')
                    ->setWidth(24);

                $sheet
                    ->getColumnDimension('C')
                    ->setWidth(25);

                $sheet
                    ->getColumnDimension('D')
                    ->setWidth(18);

                $sheet
                    ->getColumnDimension('E')
                    ->setWidth(18);

                $sheet
                    ->getColumnDimension('F')
                    ->setWidth(20);

                $sheet
                    ->getColumnDimension('G')
                    ->setWidth(20);


                /*
                |--------------------------------------------------------------------------
                | HEADER TABEL
                |--------------------------------------------------------------------------
                */

                for (
                    $row = 1;
                    $row <= $lastRow;
                    $row++
                ) {

                    $value = $sheet
                        ->getCell(
                            'A' . $row
                        )
                        ->getValue();


                    if (
                        in_array(
                            $value,
                            [
                                'PENDAPATAN BULANAN',
                                'TRANSAKSI BULANAN',
                                'RENTAL TERBARU',
                                'STOK BARANG RENDAH'
                            ]
                        )
                    ) {

                        $sheet->mergeCells(
                            'A' . $row . ':G' . $row
                        );


                        $sheet
                            ->getStyle(
                                'A' . $row . ':G' . $row
                            )
                            ->applyFromArray([

                                'font' => [

                                    'bold' => true,

                                    'color' => [
                                        'rgb' => 'FFFFFF'
                                    ],

                                ],

                                'fill' => [

                                    'fillType' =>
                                        Fill::FILL_SOLID,

                                    'color' => [
                                        'rgb' => '2563EB'
                                    ],

                                ],

                            ]);
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | ALIGNMENT
                |--------------------------------------------------------------------------
                */

                $sheet
                    ->getStyle(
                        'A1:G' . $lastRow
                    )
                    ->getAlignment()
                    ->setWrapText(true);
            },

        ];
    }


    /**
     * =====================================================
     * LEBAR KOLOM
     * =====================================================
     */
    public function columnWidths(): array
    {
        return [

            'A' => 22,

            'B' => 25,

            'C' => 25,

            'D' => 20,

            'E' => 20,

            'F' => 20,

            'G' => 20,

        ];
    }


    /**
     * =====================================================
     * NAMA SHEET
     * =====================================================
     */
    public function title(): string
    {
        return 'Dashboard Rental';
    }
}