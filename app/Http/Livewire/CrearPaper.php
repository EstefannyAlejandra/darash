<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\User;
use App\Models\Evento;
use App\Models\Country;
use App\Models\Paper;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoPaper;
use Illuminate\Support\Facades\Hash;

class CrearPaper extends Component
{
    use WithFileUploads;

    public $titulo;
    public $resumen;
    public $topicos;
    public $paper;
    public $evento;

    public $userPapers = [];
    public $usersp =[];


    protected $rules = [
            'titulo' => 'required|string|unique:papers',
            'resumen' => 'required|string',
            'topicos' => 'required|string',
            'paper' =>  'required|mimes:pdf',
            'userPapers' => 'required'
    ];

    public function mount(Evento $evento){

       $this-> evento = $evento;

       $this->userPapers = [
        ['email' => '', 'name' => '', 'surname' => '']
       ];
    }
     
    public function subirPapers(){
    
         $datos =  $this->validate();

          // Almacenar el paper
          $paper = $this->paper->store('public/papers');

          $datos['paper'] = str_replace('public/papers/','', $paper);

          // Crear el paper

          $crearPaper = $this->evento->papers()->create([
            'titulo' => $datos['titulo'],
            'resumen' => $datos['resumen'],
            'topicos' => $datos['topicos'],
            'paper' => $datos['paper'],
            'user_id'  => auth()->user()->id,
            ]);

            $idpaper = Paper::where('titulo',$datos['titulo'])->latest('id')->first();
        
                        
        foreach ($datos['userPapers'] as $users) {

                Autor::create([
               'name' => $users['name'],
               'surname' => $users['surname'],
               'email' => $users['email'],
               'paper_id' =>  $idpaper->id,
               'country_id' => 43
            ]);
        }

           //  Crear notificacion y enviar el email  admevento porque traigo quien creo el evento y se envia el correo
  
           $this->evento->admEvento->notify(new NuevoPaper($this->evento->id, $this->evento->name, auth()->user()->id));
  
           // Mostrar un mensaje que se envio correctamente
  
                $this->emit('paper');

           }

            public function addUsers()
            {
                $this->userPapers[] = ['email' => '','name' => '','surname' => ''];
            }

            
            public function removeUser($index)
            {
                unset($this->userPapers[$index]);
                $this->userPapers = array_values($this->userPapers);
            }

            public function render()
            {
                info($this->userPapers);
                return view('livewire.crear-paper');
            }


}
