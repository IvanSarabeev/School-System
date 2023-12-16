<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','city', 'staff', 'students', 'rating'];

    public static function rules()
    {
        return [
            'name' => 'required|string',
            'city' => 'nullable|string',
            'staff' => 'required|integer',
            'students' => 'required|integer',
            'rating' => 'required|integer|between:0,10',
        ];
    }
}
