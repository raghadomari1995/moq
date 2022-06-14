<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return view('admin.quizzes.index',['quizzes'=>$quizzes]);
    }


    public function create()
    {
        return view('admin.quizzes.create');
    }


    public function store(Request $request)
    {
        $quiz = Quiz::create($request->all());
        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.quizzes.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
