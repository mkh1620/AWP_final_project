<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\ResearchGrant;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::with('grant')->get();
        return view('milestones.index', compact('milestones'));
    }

    public function update(Request $request, Milestone $milestone)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'target_date' => 'required|date',
        'status' => 'required|string',
        'deliverable' => 'required|string',
        'grant_id' => 'required|exists:research_grants,id',
    ]);

    // Map 'grant_id' from the form to 'research_grant_id' in the database
    $milestone->update([
        'name' => $validated['name'],
        'target_date' => $validated['target_date'],
        'status' => $validated['status'],
        'deliverable' => $validated['deliverable'],
        'research_grant_id' => $validated['grant_id'],
    ]);

    return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully.');
}


    public function create()
    {
        $grants = ResearchGrant::all();
        return view('milestones.create', compact('grants'));
    }

    public function store(Request $request)
    {
        // Log the incoming request for debugging
        \Log::info($request->all());

        // Validate input
        $request->validate([
            'research_grant_id' => 'required|exists:research_grants,id',
            'name' => 'required|string|max:255',
            'target_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'deliverable' => 'required|string',
        ]);

        // Insert into the database
        Milestone::create([
            'research_grant_id' => $request->research_grant_id,
            'name' => $request->name,
            'target_date' => $request->target_date,
            'status' => $request->status,
            'deliverable' => $request->deliverable,
        ]);

        return redirect()->route('milestones.index')->with('success', 'Milestone created successfully.');
    }
}
