<?php

namespace App\Http\Livewire\Note;

use Livewire\Component;
use App\Models\Matiere;
use App\Models\Option;
use App\Models\Notes;


class FormeAdd extends Component
{
    public $titre=null;
    public $matiere;
    public $option;
    public $w_selectedmatiere;
    public $w_note=0;
    public $w_matricule=0;
    public $w_selectedClasse;
    public $temp_data=[];
    public $Notedata=[];
    public $erreur=false;

    

    
    public function render()
    {
        $this->matiere=Matiere::selectRaw('matieres.*')->get();
        $this->option=Option::selectRaw('options.*')->get();
        


        return view('livewire.note.forme-add',["matiere"=>$this->matiere,"option"=>$this->option]);
    }

    public function updatedW_selectedmatiere($value){
        $this->w_selectedmatiere=$value;
    }

    public function updatedW_note($value){
        $this->w_note=$value;
    }

    public function updatedW_matricule($value){
        
        $this->w_matricule=$value;
        
        /*$this->Notedata=Notes::selectRaw('users.nom as nom_etd,users.prenom ,options.id as option,options.nom as classe,options.niveau,options._idmention')
        ->join('users', 'notes._idUser', 'users.id')
        ->join('options', 'notes._idOption', 'options.id')
        ->where('matricule', $this->w_matricule)
        ->get();*/
    }

    public function updatedW_selectedClasse($value){
        $this->w_selectedClasse=$value;

    }

   

   

    /** fonction qui va nous permettre d'ajouter des donnée dans un tableau temporaire */

    public function onAdd($value){
        if ($this->w_selectedmatiere==null || $this->w_note==0 
        || $this->w_matricule==0 || $this->w_selectedClasse==null ) {
           $this->erreur=true;

        }
        else{
        array_push($this->temp_data,[
            "_idmatiere"=>$this->w_selectedmatiere,
            "note"=>$this->w_note,
            "_idUser"=>$this->w_matricule,
            "idU"=>$value,
            "_idOption"=>$this->w_selectedClasse
        ]);
    }

    }

    public $err=null;
    public function onSave(){
            try {
                
                foreach ($this->temp_data as $value) {
                       Notes::create([
                        "_idmatiere"=>$value["_idmatiere"],
                        "note"=>$value["note"],
                        "_idUser"=>$value["idU"],
                        "_idOption"=>$value["_idOption"]
        
                    ]);
                        
                }
                return redirect('admin/note');
            } catch (\Throwable $th) {
                $this->err="une erreur est survenue".$th;
            }
         
    }


    public function deleteNote($value) {
        array_splice($this->temp_data, $value, 1);
    }

  

  

}
