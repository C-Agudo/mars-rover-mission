<?php

namespace Src\SpaceExploration\Vehicles\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class EloquentVehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

}
