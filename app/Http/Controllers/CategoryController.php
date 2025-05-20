<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $dosens= Category::latest()->paginate(5);
        return view('categories.category',['dosens'=>$dosens]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'category_name' => 'required|max:25',
        'description' => 'required',
    ]);
    Category :: create($validated);
    // The blog post is valid...

    return redirect('/category');
}

    public function edit (String $id)
    {
        $dosen = Category::findOrFail($id);
        return view('categories.edit_delete', ['dosens' => $dosen]);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/category');
    }

    public function update(Request $request, string $id)
    {
        $dosen = Category::find($id);
        $dosen->category_name = $request->category_name;
        $dosen->description = $request->description;
        $dosen->update();

        return redirect('/category');
    }
}
