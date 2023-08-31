<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\User;
use App\Models\P2k3;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function index($id) {
        $user = User::where('id', $id)->first();
        return view('dashboard.profile', compact('user'));
    }
}
