<?php

namespace App\Http\Livewire;

use App\Models\Paper;
use Livewire\Component;
use App\Models\Evaluador;
use App\Notifications\Resultado;



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

       if($datos['calificacion'] == 'Aceptar'){
        $estado = 1;
        $this->paper->user->notify(new Resultado($this->paper->titulo, $this->paper->evento->name, $estado));
       }else{
        $estado = 2;
        $this->paper->user->notify(new Resultado($this->paper->titulo, $this->paper->evento->name, $estado));
       }
     
      // Mensaje de confirmacionas
        $this->emit('resultado');
    }
}
