<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanIzin extends Model
{
    use HasFactory;
    protected $table = 'karyawan_izin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'izin_pekerjaan', 'izin_pribadi', 'terlambat', 'keluarkantor', 'pulangcepat', 'tidakclock', 'keteranganizin', 'sakit', 'tgl_izin', 'sebab_lain', 'jam_1', 'jam_2'
        ];  
}
