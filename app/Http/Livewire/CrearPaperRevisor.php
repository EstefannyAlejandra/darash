<?php

namespace App\Http\Livewire;

use App\Models\Evaluador;
use App\Models\Paper;
use App\Notifications\Revisor;
use Livewire\Component;

class CrearPaperRevisor extends Component
{
    public $calificacion;
    public $observacion;
    public $paper;
    public $evaluador;

    protected $rules = [
        'calificacion' => 'required|string',
        'observacion' => 'required|string'
    ];

     public function mount(Paper $paper){
        $this-> paper = $paper;

     }

    public function render()
    {
        return view('livewire.crear-paper-revisor');
    }

    public function enviarCalificacion(){

        $datos = $this->validate();
       
      // encontrar el revisor y paper a editar

      $evaluador = Evaluador::where('paper_id', $this->paper->id)->where('email', auth()->user()->email)->firstOrFail();
      
         // Asignar los valores
         $evaluador->observacion = $datos['observacion'];
         $evaluador->calificacion = $datos['calificacion'];

             //Guardar 
            $evaluador->save();

         

  
          // Mensaje de confirmacion
               $this->emit('reviwer');
    }
}
