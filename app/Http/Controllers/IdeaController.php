<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {

     request()->validate([
        'content' => 'required|min:5|max:100',
    ]);
        $idea = Idea::create(
            [
                'content'=> request()->get('content',''),
            ]
        );
        return redirect()
         ->route('dashboard')
         ->with('success','IDEA CREATED SUCCESSFULLY !');
    }

    public function show(Idea $idea) {
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

    public function edit( Idea $idea) {
       $editing = true;
       return view('ideas.show',compact('idea','editing'));
    }
    
    public function update(Idea $idea, Request $request) {
        $request->validate([
        'content' => 'required|min:5|max:100',
    ]);
    $idea->update([
        'content' => $request->content,
    ]);
    return redirect()
         ->route('dashboard')
         ->with('success','IDEA UPDATED SUCCESSFULLY !');
    }
}
