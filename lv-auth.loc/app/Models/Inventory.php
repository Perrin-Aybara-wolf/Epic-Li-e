<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    public $table = 'inventories';

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
