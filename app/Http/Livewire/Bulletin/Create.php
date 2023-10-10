<?php

namespace App\Http\Livewire\Bulletin;

use Livewire\Component;
use App\Models\User;
use App\Models\Notes;



class Create extends Component
{
    public $matricule=0;
    public $dataUser=[];
    public $s1;
    public $s2;
    public function render()
    {
        return view('livewire.bulletin.create');
    }

    public function updatedMatricule($value){
       

        $this->dataUser= Notes::selectRaw('notes.*,users.nom as nom_etd,users.prenom ,
        options.nom as classe,options.niveau,options._idmention,
        matieres.nom as matiere, matieres.volume_horaire,matieres.coefficient_ma as coefficient,matieres.semestre,matieres._iduser as idenseignant')
        ->join('users',"notes._idUser","users.id")
        ->join('matieres','notes._idmatiere','matieres.id')
        ->join('options','notes._idOption','options.id')
        ->where('matricule',$value)
        ->get();
    }

    public function updatedS1($value){
        $this->s1=$value;
        $this->s2=$value+1;
    }
    public function updatedS2($value){
        $this->s2=$value;
        $this->s1=$value-1;
    }

   
}
