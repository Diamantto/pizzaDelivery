<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'pas',
        'street',
        'house',
        'entrance',
        'flat',
        'floor'
    ];
}
