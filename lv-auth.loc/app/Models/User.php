<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasFactory, Notifiable;
    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ============================================================================================


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function inventory($group = null)
    {
        // return $this->belongsToMany(Inventory::class, 'user_id', 'inventory_id')->where('date_set', $date)->get();
        // dd($this->belongsToMany(Inventory::class)->get());
        if (!$group)
            return $this->belongsToMany(Inventory::class);
        else
            return $this->belongsToMany(Inventory::class)
                ->where('body', $group);
    }
    
    public function countGroup($group)
    {
        return $this->belongsToMany(Inventory::class)
            ->where('body', $group)->count('inventory_id');
    }
    public function wearGroup()
    {
        return $this->belongsToMany(Inventory::class)
            ->where('is_wear', 1);
    }
}
