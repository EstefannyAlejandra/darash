<?php

namespace App\Http\Livewire;

use App\Models\Paper;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetallePaper extends Component
{
    use WithFileUploads;

    public $documento;

    protected $rules = [
        'documento' => 'required',
    ];

    public function mount(Paper $paper){
        $this-> paper = $paper;
     }

    public function render(Paper $paper)
    {
        return view('livewire.detalle-paper');
    }

    public function cargarDocumento($paper)
    {
        //  $this->validate([
        //     'documento' => 'mimes:pdf|max:2048'
        //  ]);
            $datos = $this->validate();
           // Almacenar el paper
          $documento = $this->documento->store('public/documentos');
          $datos['documento'] = str_replace('public/documentos/','', $documento);

        
          $res = Paper::find($paper);
          $res->paper =  $datos['documento'];
  
           //Guardar el evento
           $res->save();

           $this->emit('subido');

    }
}
