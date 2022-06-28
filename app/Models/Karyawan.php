<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    protected $fillable = [
            'type', 'no_form', 'counter', 'start_date', 'end_date', 'created_by', 'total_cuti', 'approved', 'approved_by', 'approved_date',
            'created_at', 'update_at', 'void', 'void_by', 'void_date'
        ];  
}
