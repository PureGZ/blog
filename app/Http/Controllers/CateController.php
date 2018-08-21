<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CateController extends Controller
{
    /**/
    public function create()
    {
    	return view('admin.cate.add');
    }
    /**/
    public function store(Request $request)
    {
    	echo "6666+";
    }
}
