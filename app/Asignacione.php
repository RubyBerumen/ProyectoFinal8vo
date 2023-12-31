<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignacione
 *
 * @property $id
 * @property $descripcion
 * @property $empleado_id
 * @property $departamento_id
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Departamento $departamento
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asignacione extends Model
{
    
    static $rules = [
		'descripcion' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
		'empleado_id' => 'required|exists:empleados,id',
		'departamento_id' => 'required|exists:departamentos,id',
		'fecha' => 'required|date',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','empleado_id','departamento_id','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Departamento', 'id', 'departamento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Empleado', 'id', 'empleado_id');
    }
    

}
