<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreenShots extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table='Screenshots';
    protected $fillable = [
        'folder',
        'date',
        'link',

    ];



}