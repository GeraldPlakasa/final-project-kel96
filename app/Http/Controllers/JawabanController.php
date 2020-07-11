<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// custom model
//use App\Models\Answer;

// eloquent model
use App\Answer;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;

class JawabanController extends Controller
{
    public function index(Request $request, $id) {
        //$answers =  Answer::get($id);
        $answers = Answer::get();
        return view('items.answers.index', compact('answers'));
    }

    public function create($id) {
        return view('items.answers.create', compact('id'));
    }

    public function store(Request $request, $id) {
        
        $answers = Answer::create([
            "user_id" => Auth::id(),
            "bodytext" => $request->bodytext,
            "question_id" => $request->question_id
        ]);

        return redirect('/pertanyaan/'.$id);
    }

    public function edit($id) {
        $answer = Answer::find($id);
        return view('items.answers.edit', compact('id', 'answer'));
    }

    public function update(Request $request, $id) {
        $edit = Answer::find($id);
        $edit->bodytext = $request->bodytext;
        $edit->save();
        return redirect('/pertanyaan/');
    }

    public function destroy($id) {
        $delete = Answer::find($id);
        $delete->delete();
        return redirect('/pertanyaan/');
    }
    
    public function show($id) {
        $answer = Answer::find($id);
        $answer->author = User::where('id', $answer->user_id)->first();
        $answer->comments = Comment::where('answer_id', $answer->id)->get();
        foreach ($answer["comments"] as $comment) { 
            // menambahkan author ke $question yang berisi nama user_id
            $comment->author = User::where('id', $comment->pemberi_komentar_id)->first();
        }
        $active_user = Auth::id(); // get current user id
        return view('items.answers.show', compact('id', 'answer', 'active_user'));
    }
}
