<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Casts\Json;
use App\Models\Order;

class User extends Authenticatable
{
    use HasFactory, Notifiable, \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    /**
     * The primary key of the table
     * @var int
     */
    protected $primaryKey  = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile'           => Json::class
    ];

    /**
     * get user orders
     */
    public function orders(){
        return $this->hasManyJson(Order::class, 'worklogs[]->user_id', 'user_id');
    }
}
