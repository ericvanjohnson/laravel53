<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    protected $table = 'company_rewarding';

    protected $primaryKey = 'reward_id';

    protected $fillable = ['name'];

}
