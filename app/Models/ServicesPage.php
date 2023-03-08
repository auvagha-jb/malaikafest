<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesPage extends Model
{
    use HasFactory;
    protected $table = 'pg_services';
    protected $primaryKey = 'serviceID';
}
