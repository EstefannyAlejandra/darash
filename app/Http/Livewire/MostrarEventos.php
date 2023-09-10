<?php

namespace App\Http\Livewire;
use App\Models\Evento;
use App\Models\User;
use Livewire\Component;

class MostrarEventos extends Component
{
    protected $listeners = ['eliminarEvento'];

    public function eliminarEvento( Evento $evento){
        $evento->delete();
    }

    public function render()
    {
        if(auth()->user()->rol === '3') {
            $eventos = Evento::paginate(10);
            return view('livewire.mostrar-eventos', ['eventos' => $eventos]);
      }elseif(auth()->user()->rol === '2'){
        $eventos = Evento::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
        return view('livewire.mostrar-eventos', ['eventos' => $eventos]);
      }elseif(auth()->user()->rol === '1'){
        $eventos = Evento::paginate(10);
        return view('livewire.mostrar-eventos', ['eventos' => $eventos]);
      }
   }
}
