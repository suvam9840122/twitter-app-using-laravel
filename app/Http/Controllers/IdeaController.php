<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {

     request()->validate([
        'idea' => 'required|min:5|max:100',
    ]);
        $idea = Idea::create(
            [
                'content'=> request()->get('idea',''),
            ]
        );
        return redirect()
         ->route('dashboard')
         ->with('success','IDEA CREATED SUCCESSFULLY !');
    }

    public function show($idea) {
        $idea = Idea::findOrFail($idea);
        return view('ideas.show',[
            'idea' => $idea
        ]);
    }

    public function destroy( Idea $idea) {
        $idea->delete();
        return redirect()
         ->route('dashboard')
         ->with('success','IDEA DELETED SUCCESSFULLY !');
    }
}
