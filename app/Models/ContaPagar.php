<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaPagar extends Model
{
    protected $table = 'bills';
    protected $fillable = [ 'description', 'value','maturity_date', 'status',  'notification_generated', 'bank_id'];
}


