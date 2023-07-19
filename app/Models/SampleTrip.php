<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleTrip extends Model
{
    use HasFactory;

    protected $table = "sample_trips";
    protected $primaryKey = "id";

}
