<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'tanggal', 'jumlah', 'status'];

    public function barangss()
    {
        return $this->belongsTo(Barangs::class, 'barang_id', 'id');
    }
}
