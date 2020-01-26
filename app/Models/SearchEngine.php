<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchEngine extends Model
{
    protected $fillable = ['se_id', 'se_name', 'se_country_name', 'se_language'];

}
