<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitteeController
{
    // Public: List all committee members grouped by department
    public function index()
    {
        // Fetch all members using Raw SQL
        $members = DB::select("SELECT * FROM committee_members ORDER BY department DESC, position DESC, name ASC");

        // Group by department in PHP for easier listing
        $groupedMembers = [];
        foreach ($members as $member) {
            $groupedMembers[$member->department][] = $member;
        }

        return view('pages.tentang', compact('groupedMembers'));
    }

    // Admin: List all members in dashboard
    public function adminIndex()
    {
        // Select with simple pagination-like manual queries is possible, or we can just fetch all for a simple dashboard
        $members = DB::select("SELECT * FROM committee_members ORDER BY created_at DESC");

        return view('pages.admin.pengurus.index', compact('members'));
    }

    // Admin: Show create member form
    public function create()
    {
        return view('pages.admin.pengurus.create');
    }

    // Admin: Store member using Raw SQL
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:committee_members,nim',
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'generation' => 'required|string|max:4',
        ]);

        // Raw SQL Insert
        DB::insert(
            "INSERT INTO committee_members (name, nim, position, department, generation, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $validated['name'],
                $validated['nim'],
                $validated['position'],
                $validated['department'],
                $validated['generation'],
                now(),
                now()
            ]
        );

        return redirect()->route('admin.pengurus.index')->with('success', 'Anggota pengurus baru berhasil ditambahkan!');
    }

    // Admin: Show edit member form
    public function edit($id)
    {
        // Raw SQL Select One
        $members = DB::select("SELECT * FROM committee_members WHERE id = ? LIMIT 1", [$id]);

        if (empty($members)) {
            abort(404, 'Anggota pengurus tidak ditemukan');
        }

        $member = $members[0];

        return view('pages.admin.pengurus.edit', compact('member'));
    }

    // Admin: Update member using Raw SQL
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:committee_members,nim,' . $id,
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'generation' => 'required|string|max:4',
        ]);

        // Raw SQL Update
        $affected = DB::update(
            "UPDATE committee_members SET name = ?, nim = ?, position = ?, department = ?, generation = ?, updated_at = ? WHERE id = ?",
            [
                $validated['name'],
                $validated['nim'],
                $validated['position'],
                $validated['department'],
                $validated['generation'],
                now(),
                $id
            ]
        );

        return redirect()->route('admin.pengurus.index')->with('success', 'Data pengurus berhasil diperbarui!');
    }

    // Admin: Delete member using Raw SQL
    public function destroy($id)
    {
        // Raw SQL Delete
        DB::delete("DELETE FROM committee_members WHERE id = ?", [$id]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Anggota pengurus berhasil dihapus!');
    }
}
