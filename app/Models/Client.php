<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'prime'
    ];


    protected $casts = [
        'prime' => 'boolean'
    ];

    // En la que 'cede' la fk, ponemos esta función.
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
