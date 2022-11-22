<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    public static function getDate($from, $until)
    {
        $date = Contact::whereBetween("created_at", [$from, $until])->get();
        return $date;
    }
}