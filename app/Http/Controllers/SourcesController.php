<?php

namespace App\Http\Controllers;

use App\Source;
use App\Category;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    public function index()
    {
        $sources = Source::orderBy('id','desc')->get();
        return view('backend.sources.index', compact('sources'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('backend.sources.create', compact('categories'));
    }

    /**
     * Creating new source
     * @param Request $request laravel request object
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:6|in:rss,html',
            'name' => 'required|string|min:5|max:64',
            'url' => 'required|string|url|max:256|unique:sources',
            'category' => 'required|int|min:1|',
        ]);

        $status = isset($request->status);

        Source::create([
            'type' => $request->type,
            'name' => $request->name,
            'url' => $request->url,
            'category_id' => $request->category,
            'status' => $status,
        ]);

        return redirect()->route('admin.sources.index')->with(['message' => 'Source added successfully.']);
    }

    public function edit($id)
    {
        $source = Source::findOrFail($id);

        $categories = Category::get();

        return view('backend.sources.edit', compact('source', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:6',
            'name' => 'required|string|min:5|max:64',
            'url'  => 'required|string|url|max:256',
            'category' => 'required|int|min:1|',
        ]);

        $status = isset($request->status);

        $source = Source::findOrFail($id);

        $source->update([
            'type' => $request->type,
            'name' => $request->name,
            'url' => $request->url,
            'category_id' => $request->category,
            'status' => $status
        ]);

        return redirect()->route('admin.sources.index')->with(['message' => 'Source updated successfully.']);
    }

    public function destroy($id)
    {
        $source = Source::findOrFail($id);
        $source->delete();

        return back()->with(['message' => 'Source deleted successfully!']);
    }
}
