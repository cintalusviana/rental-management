<?php

namespace App\Exports;

use App\Models\Rental;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ReportsExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    WithColumnWidths,
    WithTitle
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }


    /**
     * =====================================================
     * STATUS RENTAL
     * =====================================================
     */
    private function statusRentalIndonesia($status)
    {
        return match (strtolower($status ?? '')) {

            'pending' => 'Menunggu',

            'confirmed' => 'Dikonfirmasi',

            'approved' => 'Disetujui',

            'active' => 'Sedang Disewa',

            'ongoing' => 'Sedang Disewa',

            'completed' => 'Selesai',

            'complete' => 'Selesai',

            'cancelled' => 'Dibatalkan',

            'canceled' => 'Dibatalkan',

            'rejected' => 'Ditolak',

            default => $status
                ? ucfirst(str_replace('_', ' ', $status))
                : '-',
        };
    }


    /**
     * =====================================================
     * STATUS PEMBAYARAN
     * =====================================================
     */
    private function statusPembayaranIndonesia($status)
    {
        return match (strtolower(trim($status ?? ''))) {

            'lunas' => 'Lunas',

            'paid' => 'Lunas',

            'belum lunas' => 'Belum Lunas',

            'unpaid' => 'Belum Lunas',

            'pending' => 'Menunggu Pembayaran',

            'menunggu' => 'Menunggu Pembayaran',

            'menunggu pembayaran' => 'Menunggu Pembayaran',

            'rejected' => 'Ditolak',

            'ditolak' => 'Ditolak',

            'cancelled' => 'Dibatalkan',

            'dibatalkan' => 'Dibatalkan',

            default => $status
                ? ucfirst(str_replace('_', ' ', $status))
                : 'Belum Lunas',
        };
    }


    /**
     * =====================================================
     * DATA EXCEL
     * =====================================================
     */
    public function collection()
    {
        $query = Rental::with([
            'customer',
            'details.product'
        ]);


        /**
         * =================================================
         * FILTER PERIODE
         * =================================================
         */
        if ($this->startDate && $this->endDate) {

            $query->whereBetween('rental_date', [
                $this->startDate,
                $this->endDate
            ]);
        }


        /**
         * =================================================
         * AMBIL DATA
         * =================================================
         */
        $rentals = $query
            ->latest('rental_date')
            ->get();


        $data = new Collection();


        /**
         * =================================================
         * LOOP DATA RENTAL
         * =================================================
         */
        foreach ($rentals as $rental) {

            $customer = $rental->customer
                ? $rental->customer->name
                : '-';


            /**
             * =================================================
             * JIKA ADA DETAIL BARANG
             * SATU BARANG = SATU BARIS
             * =================================================
             */
            if ($rental->details->count() > 0) {

                foreach ($rental->details as $detail) {

                    $product = $detail->product
                        ? $detail->product->name
                        : '-';


                    $data->push([

                        // ID
                        $rental->id,


                        // KODE RENTAL
                        $rental->rental_code,


                        // PELANGGAN
                        $customer,


                        // TANGGAL SEWA
                        $rental->rental_date
                            ? date(
                                'd-m-Y',
                                strtotime($rental->rental_date)
                            )
                            : '-',


                        // TANGGAL KEMBALI
                        $rental->return_date
                            ? date(
                                'd-m-Y',
                                strtotime($rental->return_date)
                            )
                            : '-',


                        // BARANG
                        $product,


                        // JUMLAH
                        $detail->quantity ?? 0,


                        // HARGA BARANG
                        (float) ($detail->price ?? 0),


                        // TOTAL RENTAL
                        (float) ($rental->total_price ?? 0),


                        // STATUS RENTAL
                        $this->statusRentalIndonesia(
                            $rental->status
                        ),


                        // STATUS PEMBAYARAN
                        $this->statusPembayaranIndonesia(
                            $rental->payment_status
                        ),

                    ]);
                }


            } else {

                /**
                 * =================================================
                 * JIKA TIDAK ADA DETAIL BARANG
                 * =================================================
                 */
                $data->push([

                    // ID
                    $rental->id,


                    // KODE RENTAL
                    $rental->rental_code,


                    // PELANGGAN
                    $customer,


                    // TANGGAL SEWA
                    $rental->rental_date
                        ? date(
                            'd-m-Y',
                            strtotime($rental->rental_date)
                        )
                        : '-',


                    // TANGGAL KEMBALI
                    $rental->return_date
                        ? date(
                            'd-m-Y',
                            strtotime($rental->return_date)
                        )
                        : '-',


                    // BARANG
                    '-',


                    // JUMLAH
                    0,


                    // HARGA BARANG
                    0,


                    // TOTAL RENTAL
                    (float) ($rental->total_price ?? 0),


                    // STATUS RENTAL
                    $this->statusRentalIndonesia(
                        $rental->status
                    ),


                    // STATUS PEMBAYARAN
                    $this->statusPembayaranIndonesia(
                        $rental->payment_status
                    ),

                ]);
            }
        }


        return $data;
    }


    /**
     * =====================================================
     * HEADER EXCEL
     * =====================================================
     */
    public function headings(): array
    {
        return [

            'ID',

            'Kode Rental',

            'Pelanggan',

            'Tanggal Sewa',

            'Tanggal Kembali',

            'Barang',

            'Jumlah',

            'Harga Barang',

            'Total Rental',

            'Status Rental',

            'Status Pembayaran',

        ];
    }


    /**
     * =====================================================
     * STYLE EXCEL
     * =====================================================
     */
    public function styles(Worksheet $sheet)
    {
        /**
         * =================================================
         * HILANGKAN GRIDLINE
         * =================================================
         */
        $sheet->setShowGridlines(false);


        /**
         * =================================================
         * LAST ROW
         * =================================================
         */
        $lastRow = $sheet->getHighestRow();


        /**
         * =================================================
         * HEADER
         * =================================================
         */
        $sheet->getStyle('A1:K1')->applyFromArray([

            'font' => [

                'bold' => true,

                'color' => [
                    'rgb' => 'FFFFFF'
                ],

                'size' => 11,

            ],

            'fill' => [

                'fillType' =>
                    Fill::FILL_SOLID,

                'color' => [
                    'rgb' => '2563EB'
                ],

            ],

            'alignment' => [

                'horizontal' =>
                    Alignment::HORIZONTAL_CENTER,

                'vertical' =>
                    Alignment::VERTICAL_CENTER,

                'wrapText' => true,

            ],

            'borders' => [

                'bottom' => [

                    'borderStyle' =>
                        Border::BORDER_MEDIUM,

                    'color' => [
                        'rgb' => '1D4ED8'
                    ],

                ],

            ],

        ]);


        /**
         * =================================================
         * DATA
         * =================================================
         */
        if ($lastRow > 1) {

            $sheet->getStyle(
                'A2:K' . $lastRow
            )->applyFromArray([

                'font' => [

                    'size' => 10,

                    'color' => [
                        'rgb' => '334155'
                    ],

                ],

                'alignment' => [

                    'vertical' =>
                        Alignment::VERTICAL_CENTER,

                ],

                'borders' => [

                    'bottom' => [

                        'borderStyle' =>
                            Border::BORDER_HAIR,

                        'color' => [
                            'rgb' => 'E2E8F0'
                        ],

                    ],

                ],

            ]);


            /**
             * =================================================
             * ZEBRA ROW
             * =================================================
             */
            for (
                $row = 2;
                $row <= $lastRow;
                $row++
            ) {

                if ($row % 2 === 0) {

                    $sheet->getStyle(
                        'A' . $row . ':K' . $row
                    )->applyFromArray([

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'F8FAFC'
                            ],

                        ],

                    ]);
                }
            }


            /**
             * =================================================
             * ID
             * =================================================
             */
            $sheet->getStyle(
                'A2:A' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );


            /**
             * =================================================
             * KODE RENTAL
             * =================================================
             */
            $sheet->getStyle(
                'B2:B' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );


            /**
             * =================================================
             * TANGGAL
             * =================================================
             */
            $sheet->getStyle(
                'D2:E' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );


            /**
             * =================================================
             * JUMLAH
             * =================================================
            */
            $sheet->getStyle(
                'G2:G' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );


            /**
             * =================================================
             * HARGA BARANG
             * =================================================
             */
            $sheet->getStyle(
                'H2:H' . $lastRow
            )->getNumberFormat()
                ->setFormatCode(
                    '"Rp "#,##0'
                );


            /**
             * =================================================
             * TOTAL RENTAL
             * =================================================
             */
            $sheet->getStyle(
                'I2:I' . $lastRow
            )->getNumberFormat()
                ->setFormatCode(
                    '"Rp "#,##0'
                );


            /**
             * =================================================
             * STATUS RENTAL & PEMBAYARAN
             * =================================================
             */
            $sheet->getStyle(
                'J2:K' . $lastRow
            )->applyFromArray([

                'alignment' => [

                    'horizontal' =>
                        Alignment::HORIZONTAL_CENTER,

                    'vertical' =>
                        Alignment::VERTICAL_CENTER,

                ],

                'font' => [

                    'bold' => true,

                ],

            ]);


            /**
             * =================================================
             * WARNA STATUS
             * =================================================
             */
            for (
                $row = 2;
                $row <= $lastRow;
                $row++
            ) {

                /**
                 * Ambil status rental
                 */
                $statusRental = strtolower(
                    trim(
                        (string) $sheet
                            ->getCell('J' . $row)
                            ->getValue()
                    )
                );


                /**
                 * Ambil status pembayaran
                 */
                $statusPayment = strtolower(
                    trim(
                        (string) $sheet
                            ->getCell('K' . $row)
                            ->getValue()
                    )
                );


                /*
                 * =================================================
                 * STATUS RENTAL
                 * =================================================
                 */


                /**
                 * SELESAI - HIJAU
                 */
                if ($statusRental === 'selesai') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '15803D'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'DCFCE7'
                            ],

                        ],

                    ]);
                }


                /**
                 * MENUNGGU - BIRU
                 */
                elseif ($statusRental === 'menunggu') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '1D4ED8'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'DBEAFE'
                            ],

                        ],

                    ]);
                }


                /**
                 * DIKONFIRMASI - BIRU
                 */
                elseif ($statusRental === 'dikonfirmasi') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '1D4ED8'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'DBEAFE'
                            ],

                        ],

                    ]);
                }


                /**
                 * DISETUJUI - BIRU
                 */
                elseif ($statusRental === 'disetujui') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '1D4ED8'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'DBEAFE'
                            ],

                        ],

                    ]);
                }


                /**
                 * SEDANG DISEWA - UNGU
                 */
                elseif ($statusRental === 'sedang disewa') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '7C3AED'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'EDE9FE'
                            ],

                        ],

                    ]);
                }


                /**
                 * DIBATALKAN - MERAH
                 */
                elseif ($statusRental === 'dibatalkan') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => 'B91C1C'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'FEE2E2'
                            ],

                        ],

                    ]);
                }


                /**
                 * DITOLAK - MERAH
                 */
                elseif ($statusRental === 'ditolak') {

                    $sheet->getStyle(
                        'J' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => 'B91C1C'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'FEE2E2'
                            ],

                        ],

                    ]);
                }


                /*
                 * =================================================
                 * STATUS PEMBAYARAN
                 * =================================================
                 */


                /**
                 * LUNAS - HIJAU
                 */
                if ($statusPayment === 'lunas') {

                    $sheet->getStyle(
                        'K' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '166534'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'DCFCE7'
                            ],

                        ],

                        'alignment' => [

                            'horizontal' =>
                                Alignment::HORIZONTAL_CENTER,

                            'vertical' =>
                                Alignment::VERTICAL_CENTER,

                        ],

                    ]);
                }


                /**
                 * BELUM LUNAS - MERAH
                 */
                elseif ($statusPayment === 'belum lunas') {

                    $sheet->getStyle(
                        'K' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => 'B91C1C'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'FEE2E2'
                            ],

                        ],

                        'alignment' => [

                            'horizontal' =>
                                Alignment::HORIZONTAL_CENTER,

                            'vertical' =>
                                Alignment::VERTICAL_CENTER,

                        ],

                    ]);
                }


                /**
                 * MENUNGGU PEMBAYARAN - BIRU
                 */
                elseif (
                    $statusPayment === 'menunggu pembayaran' ||
                    $statusPayment === 'menunggu'
                ) {

                    $sheet->getStyle(
                        'K' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => '1D4ED8'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'DBEAFE'
                            ],

                        ],

                        'alignment' => [

                            'horizontal' =>
                                Alignment::HORIZONTAL_CENTER,

                            'vertical' =>
                                Alignment::VERTICAL_CENTER,

                        ],

                    ]);
                }


                /**
                 * DITOLAK - MERAH
                 */
                elseif ($statusPayment === 'ditolak') {

                    $sheet->getStyle(
                        'K' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => 'B91C1C'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'FEE2E2'
                            ],

                        ],

                        'alignment' => [

                            'horizontal' =>
                                Alignment::HORIZONTAL_CENTER,

                            'vertical' =>
                                Alignment::VERTICAL_CENTER,

                        ],

                    ]);
                }


                /**
                 * DIBATALKAN - MERAH
                 */
                elseif ($statusPayment === 'dibatalkan') {

                    $sheet->getStyle(
                        'K' . $row
                    )->applyFromArray([

                        'font' => [

                            'bold' => true,

                            'color' => [
                                'rgb' => 'B91C1C'
                            ],

                        ],

                        'fill' => [

                            'fillType' =>
                                Fill::FILL_SOLID,

                            'color' => [
                                'rgb' => 'FEE2E2'
                            ],

                        ],

                        'alignment' => [

                            'horizontal' =>
                                Alignment::HORIZONTAL_CENTER,

                            'vertical' =>
                                Alignment::VERTICAL_CENTER,

                        ],

                    ]);
                }
            }
        }


        /**
         * =================================================
         * TINGGI HEADER
         * =================================================
         */
        $sheet->getRowDimension(1)
            ->setRowHeight(32);


        /**
         * =================================================
         * TINGGI DATA
         * =================================================
         */
        if ($lastRow > 1) {

            for (
                $row = 2;
                $row <= $lastRow;
                $row++
            ) {

                $sheet->getRowDimension($row)
                    ->setRowHeight(24);
            }
        }


        /**
         * =================================================
         * FREEZE HEADER
         * =================================================
         */
        $sheet->freezePane('A2');


        /**
         * =================================================
         * FILTER
         * =================================================
         */
        $sheet->setAutoFilter(
            'A1:K' . max($lastRow, 1)
        );


        /**
         * =================================================
         * ALIGNMENT PELANGGAN
         * =================================================
         */
        if ($lastRow >= 2) {

            $sheet->getStyle(
                'C2:C' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_LEFT
                );


            /**
             * =================================================
             * BARANG
             * =================================================
             */
            $sheet->getStyle(
                'F2:F' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_LEFT
                );


            /**
             * =================================================
             * HARGA
             * =================================================
             */
            $sheet->getStyle(
                'H2:I' . $lastRow
            )->getAlignment()
                ->setHorizontal(
                    Alignment::HORIZONTAL_RIGHT
                );
        }


        return $sheet;
    }


    /**
     * =====================================================
     * LEBAR KOLOM
     * =====================================================
     */
    public function columnWidths(): array
    {
        return [

            'A' => 8,

            'B' => 25,

            'C' => 25,

            'D' => 17,

            'E' => 18,

            'F' => 30,

            'G' => 10,

            'H' => 19,

            'I' => 20,

            'J' => 20,

            'K' => 23,

        ];
    }


    /**
     * =====================================================
     * NAMA SHEET
     * =====================================================
     */
    public function title(): string
    {
        return 'Laporan Rental';
    }
}