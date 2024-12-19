<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistic extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'Statistic';
    protected $guarded = [];
    public $timestamps = false;

    public function task(){
        // return $this->hasMany(Task::class, 'task_id', 'id');
        return $this->belongsTo(Task::class);
    }
}
