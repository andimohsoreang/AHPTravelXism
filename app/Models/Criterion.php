<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function subCriteria()
    {
        return $this->hasMany(SubCriterion::class);
    }

    public function alternatives()
    {
        return $this->belongsToMany(Alternative::class)->withPivot('value');
    }
}
