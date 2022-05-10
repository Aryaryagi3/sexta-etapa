<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = "borrow";
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class);
    }

    public function book() {
        return $this->hasOne(Book::class);
    }
}
