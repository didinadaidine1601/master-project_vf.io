<?php

namespace App\Http\Livewire\Note;

use Livewire\Component;

class Datasource extends Component
{
    public $titre=null;
    public $list=null;
    public $change;
    public function render()
    {
        return view('livewire.note.datasource');
    }

   
}
