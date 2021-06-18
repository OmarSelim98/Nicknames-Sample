<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Phone;

class Name extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'email'
    ];

    public function phone(){
        return $this->belongsTo(Phone::class);
    }

    public function toSearchableArray()
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "phone_id" => $this->phone_id
        ];
    }
}
