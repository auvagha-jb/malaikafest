<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventcategories extends Model
{
    use HasFactory;
    protected $table = 'event_categories';
    protected $primaryKey = 'eventCategoryID';
}
