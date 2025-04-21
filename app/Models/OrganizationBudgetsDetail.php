<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationBudgetsDetail extends Model
{
    protected $table = 'organisasi_anggaran_items';
    protected $fillable = [
        'nama_items',
        'jumlah',
        'satuan_barang',
        'harga_satuan',
        'total_harga',
        'anggaran_id'
    ];

    public function anggaran()
    {
        return $this->belongsTo(OrganizationBudget::class, 'anggaran_id');
    }
}
