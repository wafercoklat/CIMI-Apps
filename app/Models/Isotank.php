<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isotank extends Model
{
    use HasFactory;
    protected $table = 'isotanks';
    protected $primaryKey = 'id';
    protected $fillable = [
            'code', 'plat_no', 'deskripsi', 'kepemilikan', 'status', 'Readydate', 'createdBy', 'modifyBy', 'created_at', 'updated_at'
        ];  
}
