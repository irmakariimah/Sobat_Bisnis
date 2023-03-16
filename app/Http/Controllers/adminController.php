<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    function homeadmin()
    {
        return edubisnis::all();
        return view('dashboard.index', [
            "title" => "Dashboard",
            "edubisnis" => edubisnis::all()
        ]);
    }

}
