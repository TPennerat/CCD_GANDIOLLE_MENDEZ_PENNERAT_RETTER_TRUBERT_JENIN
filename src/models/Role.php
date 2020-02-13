<?php

namespace epicerie\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function permRole()
    {
        return $this->hasOneThrough(
            '\epicerie\models\Creneau',
            '\epicerie\models\Role',
            'id', // Foreign key on users table...
            'id', // Foreign key on history table...
            'id', // Local key on suppliers table...
            'id' // Local key on users table...
        );
    }

}