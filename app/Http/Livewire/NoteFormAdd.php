<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Matiere;
use App\Models\Option;


class NoteFormAdd extends Component
{
    public $titre;
    public $matiere;
    public $option;
    public $data=[];

   
    public function render()
    {
        $this->matiere=Matiere::selectRaw('matieres.*')->get();
        $this->option=Option::selectRaw('options.*')->get();

        return view('livewire.note-form-add',['matiere'=>$this->matiere]);
    }

  
    public function add($value){
   }

}
