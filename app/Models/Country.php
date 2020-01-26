<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    protected $fillable = ['loc_id', 'loc_name', 'loc_name_canonical'];

}
