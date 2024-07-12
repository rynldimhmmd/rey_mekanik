<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servis extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_servis';
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_servis',
        'id_mekanik',
        'jenis_servis',
        'tanggal_servis',
    ];

    public function mekanik(){
        return $this->belongsTo(mekanik::class, 'id_mekanik');
    }
}
