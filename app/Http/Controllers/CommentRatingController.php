<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentRatingController extends Controller
{

    // TODO: Comment rating!

    public function save(Request $request) {
        $this->addRating($request);
        $this->addComment($request);

        return redirect()->route('event_detail', ['id' => $request->input('event_id')]);
    }

    public function addRating($request) {
        Rating::create([
            'event_id' => $request->input('event_id'),
            'user_id' => auth()->user()->id,
            'rating' => $request->input('rating')
        ]);
    }

    public function addComment($request) {
        Comment::create([
            'event_id' => $request->input('event_id'),
            'user_id' => auth()->user()->id,
            'comment' => $request->input('comment')
        ]);
    }
}
