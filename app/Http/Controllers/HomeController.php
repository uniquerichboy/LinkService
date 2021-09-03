<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $link = Links::paginate(20);
        return view('home', compact('link'));
    }

    public function create(Request $r)
    {
        $link = $r->get('link');
        $time = $this->generateRandomString();
        $new = 'imeow.ru/'.$time;
        Links::create([
            'old' => $r->get('link'),
            'new' => $new,
            'ids' => $time,
        ]);
        return back();
    }

    function generateRandomString($length = 3) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function link($id)
    {
        $link = Links::where('ids', $id)->first();
        return redirect($link->old);
    }
}
