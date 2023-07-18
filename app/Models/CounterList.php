<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterList extends Model
{
    use HasFactory;

    protected $table = "counter_lists";
    protected $primaryKey = "id";

}
