<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            'content' => 'required|min:5|max:100',
        ]);
        $validated['user_id'] = auth()->id();

        Idea::create($validated);
        return redirect()
            ->route('dashboard')
            ->with('success', 'IDEA CREATED SUCCESSFULLY !');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function destroy(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(403);
        }
        $idea->delete();
        return redirect()
            ->route('dashboard')
            ->with('success', 'IDEA DELETED SUCCESSFULLY !');
    }

    public function edit(Idea $idea)
    {
         if(auth()->id() !== $idea->user_id) {
            abort(403);
        }

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea, Request $request)
    {

    if(auth()->id() !== $idea->user_id) {
            abort(403);
        }

        $validated = $request->validate([
            'content' => 'required|min:5|max:100',
        ]);
        $idea->update($validated);
        return redirect()
            ->route('ideas.show', $idea->id)
            ->with('editing', true)
            ->with('success', 'IDEA UPDATED SUCCESSFULLY !');
    }
}
