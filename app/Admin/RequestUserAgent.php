<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class RequestUserAgent extends Model
{
    protected $table = 'agent_requests';    
    protected $guarded = []; // all fillable exccept  ['id', 'created_at', 'updated_at']
}
