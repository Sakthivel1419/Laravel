<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'company_id'
    ];

    public function company() {
        return $this->belongsTo(Company::class,'company_id');
    }

    // public function users() {
    //     return $this->belongsTo(User::class);
    // }
}
