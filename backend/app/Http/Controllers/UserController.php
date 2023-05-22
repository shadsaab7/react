<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index(){
 
    return response()->json(User::latest()->get());
}

public function addData(Request $request){

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'age' => $request->age,
    ]);
 
    return response()->json('added successfully');
}

public function edit($id){

    return response()->json(User::find($id));
}

public function update(Request $request, $id){

    User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
    ]);
 
    return response()->json('updated successfully');
}

public function view($id){

    return response()->json(User::find($id));
}

public function destroy($id){

    return response()->json(User::whereId($id)->first()->delete($id));
}

}
