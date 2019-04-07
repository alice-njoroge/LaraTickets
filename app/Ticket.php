<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * mass assignable fields
     */
    protected $fillable=['user_id','title', 'description'];
}
