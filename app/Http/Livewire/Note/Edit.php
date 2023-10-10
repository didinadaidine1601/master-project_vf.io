<?php

namespace App\Http\Livewire\Note;

use Livewire\Component;
use App\Models\Matiere;
use App\Models\Option;
use App\Models\Notes;
use App\Models\User;


class Edit extends Component
{
    public $titre;
    public $matiere;
    public $option;
    public $data;

    public $w_matricule=0;
    public $w_selectedmatiere;
    public $w_note=0;
    public $w_selectedClasse;
    public $w_coefficient=0;
    public $erreur=false;



    public function render()
    {
        $this->matiere=Matiere::selectRaw('matieres.*')->get();
        $this->option=Option::selectRaw('options.*')->get();
        return view('livewire.note.edit');
    }

    public function mount(){
       $this->w_selectedmatiere=$this->data->_idmatiere;
       $this->w_note=$this->data->note;
        $this->w_matricule= $this->getMatricule($this->data->_idUser);
        $this->w_selectedClasse=$this->data->_idOption;
        $this->w_coefficient=$this->data->coefficient;

    }


    public function getMatricule($id){
        $data=User::selectRaw('users.*')
        ->where('id',$id)
        ->get();
        $matricule=0;
        foreach ($data as $value) {
            $matricule=$value->matricule;
        }
        return $matricule;
    }

    public function updatedW_selectedmatiere($value){
        $this->w_selectedmatiere=$value;
    }

    public function updatedW_note($value){
        $this->w_note=$value;
    }

    public function updatedW_matricule($value){
        $this->w_matricule=$value;
    }

    public function updatedW_selectedClasse($value){
        $this->w_selectedClasse=$value;

    }

    public function updatedW_coefficient($value){
        $this->w_coefficient=$value;
    }
}
