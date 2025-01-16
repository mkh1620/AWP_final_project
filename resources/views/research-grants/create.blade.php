@extends('layouts.app')

@section('title', 'Add Research Grant')

@section('content')
<div style="background-color: #f4f4f9; padding: 20px; min-height: 100vh;">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <!-- Page Title -->
        <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Add Research Grant</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add Research Grant Form -->
        <form method="POST" action="{{ route('research-grants.store') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="title" style="display: block; color: #555; margin-bottom: 5px;">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter grant title" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="project_leader_id" style="display: block; color: #555; margin-bottom: 5px;">Project Leader</label>
                <select id="project_leader_id" name="project_leader_id" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="" disabled selected>Select Project Leader</option>
                    @foreach ($academicians as $academician)
                        <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="amount" style="display: block; color: #555; margin-bottom: 5px;">Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter grant amount" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="provider" style="display: block; color: #555; margin-bottom: 5px;">Provider</label>
                <input type="text" id="provider" name="provider" placeholder="Enter grant provider" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="start_date" style="display: block; color: #555; margin-bottom: 5px;">Start Date</label>
                <input type="date" id="start_date" name="start_date" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="duration_months" style="display: block; color: #555; margin-bottom: 5px;">Duration (Months)</label>
                <input type="number" id="duration_months" name="duration_months" placeholder="Enter duration in months" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="members" style="display: block; color: #555; margin-bottom: 5px;">Project Members</label>
                <select id="members" name="members[]" multiple
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    @foreach ($academicians as $academician)
                        <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                    @endforeach
                </select>
                <small style="color: #888;">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.</small>
            </div>

            <div style="text-align: center;">
                <button type="submit" style="background: #2575fc; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Add Research Grant</button>
                <a href="{{ route('research-grants.index') }}" style="margin-left: 10px; padding: 10px 20px; background: #6a11cb; color: white; border-radius: 5px; text-decoration: none;">Back to List</a>
            </div>
        </form>
    </div>
</div>
@endsection
