<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\User;
use App\Models\Paper;
use App\Models\Evento;
use Livewire\Component;
use App\Models\Evaluador;
use Livewire\WithFileUploads;
use App\Notifications\NuevoPaper;
use App\Notifications\Revisor;
use Illuminate\Support\Facades\Hash;

class crearRevisores extends Component
{
    use WithFileUploads;
    public $paper;
    public $name;
    public $surname;
    public $email;


    protected $rules = [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
    ];

    public function mount(Paper $paper){
        $this-> paper = $paper; 
        
     }

    public function render(Paper $paper)
    {
        
        return view('livewire.crear-revisores');

    }

    public function enviarRevisor($paper){
    
        $datos =  $this->validate();

        // Guardar los revisores 

        $crearEvaluador =  Evaluador::create([

            'name' => $datos['name'],
            'surname' => $datos['surname'],
            'email' => $datos['email'],
            'paper_id' => $paper,
            'observacion' => '',
            'calificacion' => ''
        ]);


         //  Crear notificacion y enviar el email 

            // $nuevaPostulacion = new Revisor();
            // $nuevaPostulacion->$paper;
            // $nuevaPostulacion->$datos['email'];
            // $nuevaPostulacion->$datos['email'];
            
            // $this->vacante->reclutador->notify($nuevaPostulacion);
        
            session()->flash('mensaje','Se envio notificacion al revisor exitosamente');

            $this->reset([
                'name',
                'surname',
                'email'
            ]);
   }

}
