<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    protected $fillable = ['task_id', 'post_key', 'post_site', 'result_datetime', 'result_position', 'result_url', 'result_title', 'result_snippet_extra', 'result_snippet', 'results_count', 'result_extra', 'result_spell', 'result_spell_type', 'result_se_check_url'];
}
