<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleAgenda extends Model
{
    protected $table = 'googleAgendas';
    protected $fillable = [ 'titulo', 'event_date', 'event_time', 'event_description', 'google_event_id', 'account_id'];
}
