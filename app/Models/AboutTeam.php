<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTeam extends Model
{
    use HasFactory;
    protected $table = 'pg_about_team';
    protected $primaryKey = 'memberID';
}
