<?php

namespace Modules\CustomerFeedback\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['message'];

    protected $table = 'feedbacks';
}
