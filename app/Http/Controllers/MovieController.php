<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $dosens= Movie::latest()->paginate(5);
        return view('movies.movie',['dosens'=>$dosens]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'title' => 'required|max:25',
        'synopsis' => 'required|max:50',
        'actors' => 'required'
    ]);
    Movie :: create($validated);
    // The blog post is valid...

    return redirect('/movie');
}

    public function edit (String $id)
    {
        $dosen = Movie::findOrFail($id);
        return view('movies.edit_delete', ['dosens' => $dosen]);
    }

    public function destroy($id)
    {
        Movie::destroy($id);
        return redirect('/movie');
    }

    public function update(Request $request, string $id)
    {
        $dosen = Movie::find($id);
        $dosen->title = $request->title;
        $dosen->synopsis = $request->synopsis;
        $dosen->actors = $request->actors;
        $dosen->update();

        return redirect('/movie');
    }
}
