<?php

namespace App\Models\Cancelacion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cancelacion\detallecan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Cancelacion extends Model
{
    use LogsActivity;
    use HasFactory;
    use SoftDeletes;

        protected $fillable = [
        'id',
        'oficio',
        'placa',
        'user_id'
    ];
    protected static $logAttributes = ['id', 'oficio', 'placa'];


    public function detallecancelacion()
    {
        return $this->morphMany(detallecan::class, 'detallecanable');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['id', 'oficio', 'placa']);
        // Chain fluent methods for configuration options
    }

}
