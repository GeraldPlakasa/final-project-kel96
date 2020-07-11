<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::all();
        $active_user = Auth::id(); // get current user id

        foreach ($comments as $comment) { 
            // menambahkan author ke $comment yang berisi nama pemberi_komentar_id
            $comment->author = User::where('id', $comment->pemberi_komentar_id)->first();
        }

        // kalo belum ada comment yang masuk
        if($comments->isEmpty()) {
            return view('items.comments.null');
        } else {
            return view('items.comments.index', compact('comments', 'active_user'));
        }
    }
    public function create($id) {
        return view ('items.comments.form', compact('id'));
    }

    public function store(Request $request, $id) {
        $new_comment = new Comment;
        $new_comment->pemberi_komentar_id = Auth::id(); // inisiasi id active user
        $new_comment->isi = $request["isi"];
        $new_comment->answer_id = $id;
        $new_comment->save();

        return redirect('/jawaban/'.$id);
    }

    public function edit($id) {
        $comment = Comment::find($id);
        return view('items.comments.edit', compact('comment'));
    }

    public function update($id, Request $request) {
        $comment = Comment::find($id);
        $comment->isi = $request->isi;
        $comment->save();
        return redirect('/pertanyaan');
    }

    public function destroy($id) {
        $deleted = Comment::find($id);
        $deleted->delete();
        return redirect('/pertanyaan');
    }
}
