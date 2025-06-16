<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'password', 'bank_id'];

   public function bank()
{
    return $this->belongsTo(Bank::class, 'bank_id');
}
}

