<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mekanik extends Model
{
    use HasFactory;
    public $timestamps = false;

     // Set the primary key
     protected $primaryKey = 'id_mekanik';

     // If your primary key is not an incrementing integer, you should also set this property
     public $incrementing = false;
 
     // If your primary key is not an integer, you should also set this property
     protected $keyType = 'string';
 

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_mekanik',
        'id_servis',
        'nama',
        'alamat',
        'notelp',
        'created_at'
    ];
}
