<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Links;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function link($id)
    {
        $link = Links::where('ids', $id)->first();
        return redirect($link->old);
    }
}
