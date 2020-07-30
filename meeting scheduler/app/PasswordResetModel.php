<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordResetModel extends Model
{
    public $table='password_resets';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
