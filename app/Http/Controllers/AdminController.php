<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        
    
        return view ('admin.home', ['nome'=>$user]);
    }
}
