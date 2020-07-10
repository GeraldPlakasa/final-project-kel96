<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// custom model
//use App\Models\Answer;

// eloquent model
use App\Answer;

class JawabanController extends Controller
{
    public function index(Request $request, $id) {
        //$answers =  Answer::get($id);
        $answers = Answer::get();
        return view('answer.index', compact('answers'));
    }

    public function create($id) {
        return view('answer.create', compact('id'));
    }

    public function store(Request $request, $id) {
        // cara custom model
        //$question = Answer::save($request->all());

        // cara eloquent
        // $answers = new Answer;
        // $answers->bodytext = $request->bodytext;
        // $answers->question_id = $request->question_id;
        // $answers->save();
        
        $answers = Answer::create([
            "bodytext" => $request->bodytext,
            "question_id" => $request->question_id
        ]);

        return redirect('/jawaban/'.$id);
    }

    public function edit($id) {
        $answer = Answer::find($id);
        return view('answer.edit', compact('id', 'answer'));
    }

    public function update(Request $request, $id) {
        $edit = Answer::find($id);
        $edit->bodytext = $request->bodytext;
        $edit->save();
        return redirect('/pertanyaan');
    }

    public function destroy($id) {
        $delete = Answer::find($id);
        $delete->delete();
        return redirect('/pertanyaan');
    }
    
}
