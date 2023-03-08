<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTestimonials extends Model
{
    use HasFactory;
    protected $table = 'pg_home_testimonials';
    protected $primaryKey = 'testimonialID';
}
