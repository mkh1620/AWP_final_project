@extends('layouts.app')

@section('content')
<div style="padding: 20px; min-height: 100vh; background-color: #f4f4f9;">
    <div style="max-width: 1200px; margin: 0 auto;">

        <!-- Page Title -->
        <h1 style="text-align: center; color: #333; margin-bottom: 20px; font-weight: 700;">Research Grants</h1>

        <!-- Add Research Grant Button (only visible for admin) -->
        @if(auth()->user()->isAdmin())
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="{{ route('research-grants.create') }}" style="padding: 10px 20px; text-decoration: none; background: #2575fc; color: white; border-radius: 5px; font-weight: 600;">Add Research Grant</a>
        </div>
        @endif

        <!-- Table -->
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr style="background: #2575fc; color: white; text-align: left;">
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Project Title</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Project Leader</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Grant Amount</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Grant Provider</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Start Date</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Duration (Months)</th>
                    @if(auth()->user()->isAdmin())
                        <th style="padding: 10px; text-align: center; font-size: 16px; font-weight: 600;">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($researchGrants as $grant)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $grant->title }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $grant->leader ? $grant->leader->name : 'Not Assigned' }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">RM {{ number_format($grant->amount, 2) }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $grant->provider }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ date('Y-m-d', strtotime($grant->start_date)) }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $grant->duration_months }}</td>
                        @if(auth()->user()->isAdmin())
                        <td style="padding: 10px; text-align: center;">
                            <a href="{{ route('research-grants.edit', $grant) }}" style="color: #2575fc; text-decoration: none; margin-right: 10px; font-size: 14px;">Edit</a>
                            <form action="{{ route('research-grants.destroy', $grant) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: none; font-size: 14px;">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ auth()->user()->isAdmin() ? 7 : 6 }}" style="text-align: center; padding: 20px; color: #666; font-size: 15px;">No research grants found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
