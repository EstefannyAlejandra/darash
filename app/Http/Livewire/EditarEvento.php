<?php

namespace App\Http\Livewire;
use App\Models\Evento;
use Livewire\Component;

class EditarEvento extends Component
{
    public $name;
    public $fecha_fin;
    public $evento_id;
    public $user_id;

    protected $rules = [
        'name' => 'required|string',
        'fecha_fin' => 'required|date'
    ];

    public function mount(Evento $evento)
    {
            $this->name = $evento->name;
            $this->fecha_fin = $evento->fecha_fin;
            $this->evento_id= $evento->id; 
           // $this->user_id = auth()->user()->id;
    }

    public function editarEvento()
    {
      
        $datos = $this->validate();
       // Encontrar el evento a editar
       $evento = Evento::find($this->evento_id);
 
       // Asignar los valores
       $evento->name = $datos['name'];
       $evento->fecha_fin = $datos['fecha_fin'];

       //Guardar el evento
       $evento->save();

       // Redireccional 
       session()->flash('mensaje','El evento se actualizo correctamente');
       return redirect()->route('eventos.index');
    }

    public function render()
    {
        return view('livewire.editar-evento');
    }

    
}
