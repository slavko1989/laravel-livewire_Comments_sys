<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Comm;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class Comment extends Component
{

    use WithPagination;
    use WithFileUploads;

   //public $comments;
   public $newComm;
   public $image;


  

  public function upload(){

    if(!$this->image) {return null; }


      

    $this->image->store('photos','public');
    $this->image = "";

  }

   public function updated($field){
    $this->validateOnly($field,['newComm'=>'required|max:255',
                                 'image'=>'required',
        ]);
   }

    public function render()
    {
        return view('livewire.comment',[
            'comments' => Comm::latest()->paginate(2)
        ]);
    }


    public function addComment(){

       $this->validate(['newComm'=>'required|max:255',
   'image'=>'required'
]);
        
        $img = $this->upload();
        $addComm = Comm::create([
            'body'=>$this->newComm,'user_id'=>1,
            'image'=>$img,
    ]);
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
