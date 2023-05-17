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
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignacione[] $asignaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'fechaNac' => 'required',
		'genero' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','fechaNac','genero','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaciones()
    {
        return $this->hasMany('App\Asignacione', 'empleado_id', 'id');
    }
    

}
