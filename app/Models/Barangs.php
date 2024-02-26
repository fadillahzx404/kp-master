<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Appstract\Stock\HasStock;

class Barangs extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'merk_id', 'unit', 'stock', 'photo'];

    public function merks()
    {
        return $this->belongsTo(Merks::class, 'merk_id', 'id');
    }

    public function transactionss()
    {
        return $this->hasMany(Transactions::class, 'barang_id');
    }
}
