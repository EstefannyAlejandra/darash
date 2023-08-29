<?php

namespace App\Http\Livewire;
use App\Models\Evento;
use Livewire\Component;

class CrearEvento extends Component
{
    public $name;
    public $fecha_fin;

    protected $rules = [
        'name' => 'required|unique:eventos',
        'fecha_fin' => 'required|date'
    ];

    public function crearEvento()
    {
       $datos =  $this->validate();

       // Crear el evento 

        Evento::create([
            'name' => $datos['name'],
            'fecha_fin' =>  $datos['fecha_fin'],
            'user_id' => auth()->user()->id ,
        ]);

       // Crear un mensaje
            session()->flash('mensaje','El evento fue creado exitosamente');

       // Redireccionar al usuario 

            return redirect()->route('eventos.index');

    }

    public function render()
    {
        return view('livewire.crear-evento');
    }
}
