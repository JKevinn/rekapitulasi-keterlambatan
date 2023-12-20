<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function($model) {
            $model->id = Str::uuid();
        });
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'rayon_id', 'id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id', 'id');
    }

    public function late(){
        return $this->hasOne(Late::class);
    }
}
