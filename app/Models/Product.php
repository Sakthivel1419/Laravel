<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'name',
        'price',
        'quantity'
    ];

    // public function company() {
    //     return $this->belongsTo(Company::class);
    // }
}
