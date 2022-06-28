<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawanCuti extends Model
{
    use HasFactory;
    protected $table = 'karyawan_cuti';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cuti_tahunan', 'cuti_diluar_tanggungan', 'cuti_khusus total_cuti', 'tgl_pengajuan_s', 'tgl_pengajuan_e', 'tgl_kembali_kerja', 'alasan', 'pengganti_pic', 'jabatan_pic', 'cuti_menikah_st', 'cuti_menikah_en', 'cuti_sblm_melahirkan_st', 'cuti_sblm_melahirkan_en', 'cuti_stlh_melahirkan_st', 'cuti_stlh_melahirkan_en', 'cuti_anak_st', 'cuti_anak_en', 'cuti_dukacita_st', 'cuti_dukacita_en', 'cuti_istri_st', 'cuti_istri_en', 'created_at', 'updated_at'
        ];  
}
