<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CrudController extends Controller
{
    public function showData()
    {
        // $showData = Crud::all();
        $showData = Crud::paginate(5);

        return view('show_data', compact('showData'));
    }

    public function addData()
    {

        return view('add_data');
    }

    public function storeData(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ];
        $messages = [
            'name.required' => 'Name field is required. Please enter your name.',
            'name.string'   => 'Name must be text.',
            'name.max'      => 'Name cannot be longer than 10 characters.',

            'email.required' => 'Email field is required. Please enter your email.',
            'email.email'    => 'Please provide a valid email address.',
            'email.unique'   => 'This email is already registered. Try another one.',
        ];
        $request->validate($rules);
        //datasave
        $crud = new Crud();
        $crud->name  = $request->name;
        $crud->email = $request->email;
        $crud->save();

        // Flash message
        Session::flash('msg', 'Data Successfully Added to Database');

        return redirect('/');
    }

    // public function getData()
    // {
    //     try {
    //         $data = Crud::all(); // database থেকে সব ডাটা আনবো
    //         return response()->json([
    //             'status' => 'success',
    //             'data'   => $data
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status'  => 'error',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function getData()
    {
        $data = Crud::all();
        return response()->json($data);
    }
}
