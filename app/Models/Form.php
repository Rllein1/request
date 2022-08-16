<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function department()
    {
        return $this->belongsTo(Department::class,"sender",'id');
    }

    use HasFactory;

}
