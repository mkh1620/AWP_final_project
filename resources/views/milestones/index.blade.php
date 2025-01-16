@extends('layouts.app')

@section('content')
<div style="padding: 20px; min-height: 100vh; background-color: #f4f4f9;">
    <div style="max-width: 1200px; margin: 0 auto;">

        <!-- Page Title -->
        <h1 style="text-align: center; color: #333; margin-bottom: 20px; font-weight: 700;">Milestones</h1>

        <!-- Add Milestone Button (visible for admins and project leaders) -->
        @if(auth()->user()->isAdmin() || auth()->user()->isProjectLeader())
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="{{ route('milestones.create') }}" style="padding: 10px 20px; text-decoration: none; background: #2575fc; color: white; border-radius: 5px; font-weight: 600;">Add Milestone</a>
        </div>
        @endif

        <!-- Table -->
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr style="background: #2575fc; color: white; text-align: left;">
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Milestone Name</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Target Date</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Status</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Deliverable</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Associated Grant</th>
                    <th style="padding: 10px; text-align: center; font-size: 16px; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($milestones as $milestone)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $milestone->name }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ date('Y-m-d', strtotime($milestone->target_date)) }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ ucfirst($milestone->status) }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $milestone->deliverable }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">
                            {{ $milestone->grant?->title ?? 'No associated grant' }}
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <a href="{{ route('milestones.edit', $milestone) }}" style="color: #2575fc; text-decoration: none; margin-right: 10px; font-size: 14px;">Edit</a>
                            <form action="{{ route('milestones.destroy', $milestone) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: none; font-size: 14px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px; color: #666; font-size: 15px;">No milestones found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
