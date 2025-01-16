<?php
namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use App\Models\Academician;
use Illuminate\Http\Request;

class ResearchGrantController extends Controller
{
    public function index()
    {
        $researchGrants = ResearchGrant::with('leader', 'members')->get();
        return view('research-grants.index', compact('researchGrants'));
    }

    public function create()
    {
        $academicians = Academician::all();
        return view('research-grants.create', compact('academicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'project_leader_id' => 'required|exists:academicians,id',
            'amount' => 'required|numeric',
            'provider' => 'required',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer',
        ]);

        $grant = ResearchGrant::create($request->all());
        $grant->members()->sync($request->input('members', []));

        return redirect()->route('research-grants.index')->with('success', 'Research Grant created successfully.');
    }

    public function show(ResearchGrant $researchGrant)
    {
        return view('research-grants.show', compact('researchGrant'));
    }

    public function edit(ResearchGrant $researchGrant)
    {
        $academicians = Academician::all();
        return view('research-grants.edit', compact('researchGrant', 'academicians'));
    }

    public function update(Request $request, ResearchGrant $researchGrant)
    {
        $request->validate([
            'title' => 'required',
            'project_leader_id' => 'required|exists:academicians,id',
            'amount' => 'required|numeric',
            'provider' => 'required',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer',
        ]);

        $researchGrant->update($request->all());
        $researchGrant->members()->sync($request->input('members', []));

        return redirect()->route('research-grants.index')->with('success', 'Research Grant updated successfully.');
    }

    public function destroy(ResearchGrant $researchGrant)
    {
        $researchGrant->delete();
        return redirect()->route('research-grants.index')->with('success', 'Research Grant deleted successfully.');
    }
}
