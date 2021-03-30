<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Casts\Json;
use App\Models\User;

class Order extends Model
{
    use HasFactory, \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_no',
        'vendor_ord_no',
        'worklogs',
    ];

    /**
     * The primary key of the table
     * @var int
     */
    protected $primaryKey  = 'order_id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'worklogs'           => Json::class
    ];

    public function user(){
        return $this->belongsToJson(User::class, 'worklogs[]->user_id', 'user_id');
    }
}
