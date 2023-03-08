<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategories extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $primaryKey = 'blogCategoryID';
}
