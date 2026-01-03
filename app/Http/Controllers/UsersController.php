<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;

class UsersController extends Controller
{
    /**
     * Get all users.
     */
    public function getUser(){
        $user = User::all();
        return response()->json($user);
    }

    /*
    *Get a single user by ID.
    */
    public function getUserById($id){
        $user = User::find($id);
        if($user){
            return response()->json($user);
        }else{
            return response()->json(['message' => 'User not found'],404);
        }
    }

    /**
     * Create a new user.
     */

    public function createUser(Request $request){
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5',
        ]);

        $user = User::create($request->all());
        return response()->json(['message' => 'User created successfully', 'data' => $user]);
    }

    /*
    *Update an existing user.
    */
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        if($user){
            $user->update($request->all());
            return response()->json(['message' => 'User updated successfully', 'data' => $user]);
        }else{
            return response()->json(['message' => 'User not found'],404);
        }
    }

    /*
    *Delete a user.
    */
    public function deleteUser($id){
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        }else{
            return response()->json(['message' => 'User not found'],404);   
        }
    }
}