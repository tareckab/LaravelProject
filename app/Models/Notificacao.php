<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['message', 'time_date_shipping', 'status', 'notification_id'];
}
