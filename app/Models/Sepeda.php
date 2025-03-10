<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sepeda extends Model
{
    use HasFactory;
    protected $table = 'sepeda';
    protected $primaryKey = 'idSepeda';
    protected $fillable = [
        'merk',
        'sewa',
        'jumlah',
        'foto',
    ];

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'idSepeda');
    }
}
