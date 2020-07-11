<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Answer;
use App\User;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $active_user = Auth::id(); // get current user id

        foreach ($questions as $question) { 
            // menambahkan author ke $question yang berisi nama user_id
            $question->author = User::where('id', $question->user_id)->first();
        }

        // kalo belum ada comment yang masuk
        if($questions->isEmpty()) {
            return view('items.questions.null');
        } else {
            return view('items.questions.index', compact('questions', 'active_user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.questions.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = Question::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'point' => 0,
            'user_id' => Auth::id()
        ]);
        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $question->author = User::where('id', $question->user_id)->first();
        $question->answers = Answer::where('question_id', $question->id)->get();

        foreach ($question["answers"] as $answer) { 
            // menambahkan author ke $question yang berisi nama user_id
            $answer->author = User::where('id', $answer->user_id)->first();
        }
        $active_user = Auth::id(); // get current user id
        return view('items.questions.show', compact('question', 'active_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::all();
        $question = $questions->find($id);
        return view('items.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->title = $request['title'];
        $question->content = $request['content'];
        $question->save();
        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id)->delete();
        return redirect('/pertanyaan');
    }
}
