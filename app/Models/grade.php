<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas','jurusan','walikelas'
    ];

    /**
     * Get all of the murid for the grade
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function murid()
    {
        return $this->hasMany(murid::class);
    }
}
