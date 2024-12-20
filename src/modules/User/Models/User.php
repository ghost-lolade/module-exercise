<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'enabled',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

     /**
     * Define the factory for this model.
     */
    protected static function newFactory()
    {
        return \Database\Factories\UserFactory::new();
    }
}
