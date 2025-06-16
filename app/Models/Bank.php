<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name_bank',
        'agency',
        'account_number',
        'account_type',
        'user_id',
    ];

    public function usuario()
{
    return $this->belongsTo(Usuario::class, 'user_id');
}

}


