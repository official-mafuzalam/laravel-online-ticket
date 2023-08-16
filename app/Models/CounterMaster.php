<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterMaster extends Model
{
    use HasFactory;

    protected $table = "counter_masters";
    protected $primaryKey = "id";

    protected $fillable = [
        'coun_name',
        'coun_id',
        'main_route',
        'user_type',
        'user_id',
        'user_name',
        'user_mobile',
        'password',
        'email'
    ];

}