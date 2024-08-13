<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addcomment(Request $request, $id)
    {
        $validate = $request->validate([
            'comment' => ['required']
        ]);
        $data['post_id'] = $id;
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        $data['comment'] = $request->comment;

        Comments::create($data);
        return redirect()->back()->with('success', 'Comment Posted');
    }

}
