<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comm;

class CommentController extends Controller
{
    public function comment(){

        
        return view('comments');
    }
}
