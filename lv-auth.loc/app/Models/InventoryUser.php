<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryUser extends Model
{
    use HasFactory;
    public $table = 'inventory_user';
    protected $guarded = [];

    public function items_user(){
        return InventoryUser::all(['inventory_id', 'count_things'])->where('user_id', auth()->user()->id);
    }
}
