<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state_id'];

    protected $table = 'city';

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
