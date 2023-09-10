<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\User;
use App\Models\Paper;
use App\Models\Evento;
use Livewire\Component;
use App\Models\Evaluador;
use Livewire\WithFileUploads;
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

        $crearEvaluador =  $this->paper->evaluador()->create([

            'name' => $datos['name'],
            'surname' => $datos['surname'],
            'email' => $datos['email'],
            'paper_id' => $paper,
            'observacion' => '',
            'calificacion' => ''
        ]);

        $crearEvaluador->notify(new Revisor());
         //  Crear notificacion y enviar el email 
    
            // Mensaje 
        
            $this->emit('revisor');
   }

}
