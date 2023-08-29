<?php

namespace App\Http\Livewire;

use App\Models\Evaluador;
use App\Models\Paper;
use Livewire\Component;

class MostarPaperRevisor extends Component
{
    public function render()
    {
        $revisor = Evaluador::where('email',auth()->user()->email)->orderBy('id','desc')->paginate(10);
        return view('livewire.mostar-paper-revisor', ['revisor' => $revisor]);
    }
}
