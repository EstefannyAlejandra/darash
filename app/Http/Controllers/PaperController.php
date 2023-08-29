<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $evento)
    {
        if(auth()->user()->rol === '2') {
            return view('papers.index', [
                    'evento' => $evento
            ]);
        }elseif(auth()->user()->rol === '3'){
            $paper = Paper::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
             return view('papers.mispapers', [
               'paper' => $paper
             ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        return view('papers.show', [
            'paper' => $paper
           
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //
    }
}
