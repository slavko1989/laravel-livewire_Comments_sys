<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comm;
use Livewire\WithPagination;

class Comment extends Component
{

    use WithPagination;

   //public $comments;
   public $newComm;

    public function render()
    {
        return view('livewire.comment',[
            'comments' => Comm::latest()->paginate(2)
        ]);
    }


    public function addComment(){

       $this->validate(['newComm'=>'required|max:255']);
        

        $addComm = Comm::create(['body'=>$this->newComm,'user_id'=>1]);
        //$this->comments->prepend($addComm);
        $this->newComm = "";
        session()->flash('message','Comment are created'); 
 
    }

   /* public function mount(){

        $initialComm = Comm::all();
        $this->comments = $initialComm;
    }*/

    public function remove($commId){

//dd($commId);
        $delete = Comm::find($commId);
        $delete->delete();
        //$this->comments = $this->comments->except($commId);
    }
}
