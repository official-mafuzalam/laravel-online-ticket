<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripStatus extends Model
{
    use HasFactory;

    protected $table = "trip_statuses";
    protected $primaryKey = "id";
}