<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PayExport implements FromCollection,WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // Ambil hanya kolom-kolom yang diinginkan dari data
        return $this->data->map(function ($item) {
            return [
                $item->bank_name,
                $item->address_bank,
                $item->bank_city,
                $item->bank_code,
                $item->account_name,
                $item->account_number,
                $item->currency,
                $item->amount_payment,
                $item->description,
                $item->email_vendor,
                $item->transaction_type,
                $item->resident_status,
                $item->citizen_status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Bank',
            'Alamat Bank',
            'Kota',
            'Kode Bank',
            'Nama Akun',
            'Nomor Rekening',
            'Currency',
            'Jumlah Pembayaran',
            'Deskripsi',
            'Email Vendor',
            'Tipe Transaksi',
            'Resident Status',
            'Citizen Status',
        ];
    }
}