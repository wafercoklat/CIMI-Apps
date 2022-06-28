<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trans_Isotank extends Model
{
    use HasFactory;
    protected $table = 'tr_isotank';
    protected $primaryKey = 'id';
    protected $fillable = [
            'transnumber', 'counter', 'iso_id', 'cust_id', 'ori_id', 'des_id', 'packinglist_no', 'cargo_no', 'deskripsi', 'startDate', 'endDate', 'createdBy', 'created_at', 'updated_at', 'tgl_ETA', 'tgl_ETD', 'tgl_indepo_real', 'tgl_muat', 'tgl_bongkar'
        ];  
}
