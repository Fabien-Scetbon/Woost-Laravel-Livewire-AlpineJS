<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function find($userId)
    {
        try {
            $user = User::where('id', $userId)                
                ->firstOrFail();
            
            return view('admin.edit_user')->with(['user' => $user]);

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
