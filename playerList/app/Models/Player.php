<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['name','surename',
                        'email','age','phone','cell_phone','activo','coments', 'position','team']; 
                        
}
