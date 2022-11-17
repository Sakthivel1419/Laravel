<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'no_of_emp'
    ];

    // public function users() {
    //     return $this->belongsTo(User::class);
    // }

    public function product() {
        return $this->hasOne(Product::class);
    }

    public function map() {
        return $this->hasOne(Map::class,'company_id');
    }
}
