<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UKBidang extends Model
{
    use HasFactory;

    protected $table = 'uk_bidang';
    protected $primaryKey = 'id_bidang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_bidang',
        'nama_bidang'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastId = self::max('id_bidang');
            $number = $lastId ? intval(substr($lastId, 6)) + 1 : 1;
            $model->id_bidang = 'BIDANG' . str_pad($number, 1, '0', STR_PAD_LEFT);
        });
    }
}
