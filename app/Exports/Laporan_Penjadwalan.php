<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class Laporan_Penjadwalan implements FromCollection, WithHeadings
{
    var $tgl1;
    var $tgl2;
    var $loc;
    var $stat;

    public function __construct($tgl1, $tgl2, $loc, $stat)
    {
        $this->tgl1 = $tgl1;
        $this->tgl2 = $tgl2;
        $this->loc = $loc;
        $this->stat = $stat;
    }

    public function whereQry(){
        $tgl1_qry = [];

        if ($this->tgl1 <> 'NULL' || $this->tgl2 <> 'NULL' || $this->loc <> 'SMA' || $this->stat <> 'SMA') {
            array_push($tgl1_qry, "WHERE"); 
        }
        if ($this->tgl1 <> 'NULL') {
            array_push($tgl1_qry," tgl_outdepo >= '".$this->tgl1."' AND"); 
        }
        if ($this->tgl2 <> 'NULL') {
            array_push($tgl1_qry," tgl_outdepo <= '".$this->tgl2."' AND"); 
        }
        if ($this->loc <> 'SMA') {
           array_push($tgl1_qry," des LIKE '%".$this->loc."%' AND"); 
        }
        if ($this->stat <> 'SMA') {
            array_push($tgl1_qry," stats LIKE '%".$this->stat."%' AND"); 
        }
        return substr(join("", $tgl1_qry),0,-4);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() 
    {
        return collect(DB::select("select stats, transnumber, code, tgl_outdepo, tgl_indepo, tgl_indepo_real, ori, des, customername, lokasi_loading, lokasi_bongkar, vessel, transport_no, tgl_ETA, tgl_ETD, packinglist_no, partai, cargo, jLh_Partai, deskripsi, void_date, void_reason from v_trans_isotanks_det ".$this->whereQry()));
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
