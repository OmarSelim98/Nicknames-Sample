<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Name;

class Phone extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'country_code',
        'number'
    ];

    public function names(){
        return $this->hasMany(Name::class);
    }
}
