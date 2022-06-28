<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class Laporan_Penjadwalan implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select stats, transnumber, code, tgl_outdepo, tgl_indepo, tgl_indepo_real, ori, des, customername, lokasi_loading, lokasi_bongkar, vessel, transport_no, tgl_ETA, tgl_ETD, packinglist_no, partai, cargo, jLh_Partai, deskripsi, void_date, void_reason from v_trans_isotanks'));
    }

    public function headings(): array
    {
        return [
            'Status',
            'No. Transaksi',
            'No. Isotank',
            'Tgl OutDepo',
            'Tgl InDepo',
            'Fix Tgl InDepo',
            'Origin',
            'Destination',
            'Customer',
            'Lokasi Loading',
            'Lokasi Bongkar',
            'Transport',
            'No Transport',
            'Tanggal ETA',
            'Tanggal ETD',
            'Packing List',
            'No Partai',
            'Cargo',
            'Jumlah Partai',
            'Remark',
            'Batal Tanggal',
            'Alasan Batal', 
        ];
    }
}
