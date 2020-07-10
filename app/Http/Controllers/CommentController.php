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
        $active_user = Auth::id(); // get active user id

        foreach ($comments as $comment) { 
            // menambahkan author ke $comment yang berisi nama pemberi_komentar_id
            $comment->author = User::where('id', $comment->pemberi_komentar_id)->first();
        }

        // kalo belum ada comment yang masuks
        if($comments->isEmpty()) {
            return view('items/comment_null');
        } else {
            return view('items/comment_index', compact('comments', 'active_user'));
        }
    }
    public function create() {
        return view ('items.comment_form');
    }

    public function store(Request $request) {
        $new_comment = new Comment;
        $new_comment->pemberi_komentar_id = Auth::id(); // inisiasi id active user
        $new_comment->isi = $request["isi"];
        $new_comment->save();

        return redirect('/komentar');
    }

    public function edit($id) {
        $comment = Comment::find($id);
        return view('items.comment_edit', compact('comment'));
    }

    public function update($id, Request $request) {
        $comment = Comment::find($id);
        $comment->isi = $request->isi;
        $comment->save();
        return redirect('/komentar');
    }

    public function destroy($id) {
        $deleted = Comment::find($id);
        $deleted->delete();
        return redirect('/komentar');
    }
}
