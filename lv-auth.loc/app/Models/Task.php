<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'Tasks';
    protected $guarded = [];
    public $timestamps = false;

    public function category(){
        // return $this->belongsTo(Category::class, 'Category_id', 'id');
        return $this->belongsTo(Category::class);
    }
    public function records(){
        // return $this->belongsTo(Category::class, 'Category_id', 'id');
        return $this->hasMany(Statistic::class, 'task_id', 'id')
        ->get();
    }
    public function records_complete(){
        // return $this->belongsTo(Category::class, 'Category_id', 'id');
        return $this->hasMany(Statistic::class, 'task_id', 'id')
        ->where('datetime_completed', '<>', null)
        ->get();
    }
    public function recordsToday($date = null){
        $date ? $date : $date = date('Y-m-d');
        // return $this->belongsTo(Category::class, 'Category_id', 'id');
        return $this->hasMany(Statistic::class, 'task_id', 'id')->where('date_set', $date)->get();
    }
    public function recordsToday_complete($date = null){
        $date ? $date : $date = date('Y-m-d');
        // return $this->belongsTo(Category::class, 'Category_id', 'id');
        return $this->hasMany(Statistic::class, 'task_id', 'id')
        ->where('date_set', $date)
        ->where('datetime_completed', '<>', null)
        ->get();
    }

    
    public function getPercentAttribute(){
        return round((count($this->records_complete()) / count($this->records())) * 100).'%' ;
    }
}
