<?php

namespace App\Http\Livewire;

use App\Models\Paper;
use Livewire\Component;
use App\Models\Evaluador;

class ResultadosRevisores extends Component
{

    public $calificacion;

    protected $rules = [
        'calificacion' => 'required|string',
    ];

    public function mount(Paper $paper){
        $this-> paper = $paper;

     }

    public function render(Paper $paper)
    {
        return view('livewire.resultados-revisores');
    }

    public function enviarCalificacionFinal($paper) {
        $datos = $this->validate();
        $res = Paper::find($paper);
        $res->estado =  $datos['calificacion'];

         //Guardar el evento
       $res->save();
       
      // Crear notificacion y enviar el email 
      $this->evento->admEvento->notify(new NuevoPaper($this->evento->id,$this->evento->name, auth()->user()->id));

      // Mensaje de confirmacionas
       session()->flash('mensaje','Se agregos la calificacion y envio Notificacion exitosamente');
    }
}
