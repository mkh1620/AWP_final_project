@extends('layouts.app')

@section('content')
<div style="padding: 20px; min-height: 100vh; background-color: #f4f4f9;">
    <div style="max-width: 1200px; margin: 0 auto;">

        <!-- Page Title -->
        <h1 style="text-align: center; color: #333; margin-bottom: 20px; font-weight: 700;">Academicians</h1>

        <!-- Add Academician Button -->
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="{{ route('academicians.create') }}" style="padding: 10px 20px; text-decoration: none; background: #2575fc; color: white; border-radius: 5px; font-weight: 600;">Add Academician</a>
        </div>

        <!-- Table -->
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr style="background: #2575fc; color: white; text-align: left;">
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Name</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Staff Number</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Email</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">College</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Department</th>
                    <th style="padding: 10px; font-size: 16px; font-weight: 600;">Position</th>
                    <th style="padding: 10px; text-align: center; font-size: 16px; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($academicians as $academician)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $academician->name }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $academician->staff_number }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $academician->email }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $academician->college }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $academician->department }}</td>
                        <td style="padding: 10px; font-size: 15px; color: #333;">{{ $academician->position }}</td>
                        <td style="padding: 10px; text-align: center;">
                            <a href="{{ route('academicians.edit', $academician) }}" style="color: #2575fc; text-decoration: none; margin-right: 10px; font-size: 14px;">Edit</a>
                            <form action="{{ route('academicians.destroy', $academician) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: none; font-size: 14px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 20px; color: #666; font-size: 15px;">No academicians found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
