<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $fechaNac
 * @property $genero
 * @property $telefono
 * @property $departamento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignacione[] $asignaciones
 * @property Departamento $departamento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
        'nombre' => 'required|string|regex:/^[\pL\s\-]+$/u|max:20',
        'apellido' => 'required|string|regex:/^[\pL\s\-]+$/u|max:20',
        'fechaNac' => 'required|date',
        'genero' => 'required',
        'telefono' => 'required|numeric|digits:10',
        'departamento_id' => 'required|exists:departamentos,id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','fechaNac','genero','telefono','departamento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaciones()
    {
        return $this->hasMany('App\Asignacione', 'empleado_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Departamento', 'id', 'departamento_id');
    }
    

}
