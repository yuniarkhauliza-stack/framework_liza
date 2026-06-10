<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController
{
    // Public: List all news
    public function index()
    {
        $news = DB::table('news')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('pages.berita.index', compact('news'));
    }

    // Public: Show single news detail
    public function show($slug)
    {
        $article = DB::table('news')
            ->where('slug', $slug)
            ->first();

        if (!$article) {
            abort(404, 'Berita tidak ditemukan');
        }

        return view('pages.berita.show', compact('article'));
    }

    // Admin: List all news in dashboard
    public function adminIndex()
    {
        $news = DB::table('news')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.admin.berita.index', compact('news'));
    }

    // Admin: Show create news form
    public function create()
    {
        return view('pages.admin.berita.create');
    }

    // Admin: Store news
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'content' => 'required|string',
            'publish' => 'nullable|boolean',
        ]);

        $slug = Str::slug($validated['title']);
        
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;
        while (DB::table('news')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        DB::table('news')->insert([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'content' => $validated['content'],
            'published_at' => $request->has('publish') ? now() : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    // Admin: Show edit form
    public function edit($id)
    {
        $article = DB::table('news')->where('id', $id)->first();

        if (!$article) {
            abort(404, 'Berita tidak ditemukan');
        }

        return view('pages.admin.berita.edit', compact('article'));
    }

    // Admin: Update news
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'content' => 'required|string',
            'publish' => 'nullable|boolean',
        ]);

        $article = DB::table('news')->where('id', $id)->first();
        if (!$article) {
            abort(404);
        }

        // Generate new slug if title changes
        $slug = $article->slug;
        if ($article->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;
            while (DB::table('news')->where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
        }

        $published_at = $article->published_at;
        if ($request->has('publish') && !$published_at) {
            $published_at = now();
        } elseif (!$request->has('publish')) {
            $published_at = null;
        }

        DB::table('news')->where('id', $id)->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'content' => $validated['content'],
            'published_at' => $published_at,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // Admin: Delete news
    public function destroy($id)
    {
        DB::table('news')->where('id', $id)->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
