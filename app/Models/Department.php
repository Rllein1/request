<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function personnel()
    {
        return $this->hasOne(User::class,"department_id", "id");
    }

    public function head()
    {
        return $this->hasOne(User::class,"department_id", "id")->where('role_id',2);
    }

}
