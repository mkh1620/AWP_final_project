@extends('layouts.app')

@section('content')
<div style="padding: 20px; min-height: 100vh; background-color: #f4f4f9;">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

        <!-- Page Title -->
        <h1 style="text-align: center; color: #333; margin-bottom: 20px; font-weight: 700;">Create Milestone</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('milestones.store') }}">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Milestone Name:</label>
                <input type="text" id="name" name="name" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="target_date" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Target Date:</label>
                <input type="date" id="target_date" name="target_date" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="status" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Status:</label>
                <select id="status" name="status" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="deliverable" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Deliverable:</label>
                <textarea id="deliverable" name="deliverable" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" rows="4" required></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="research_grant_id" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Associated Grant:</label>
                <select id="research_grant_id" name="research_grant_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="">Select a Grant</option>
                    @foreach ($grants as $grant)
                        <option value="{{ $grant->id }}">{{ $grant->title }}</option>
                    @endforeach
                </select>
            </div>

            <div style="text-align: center;">
                <button type="submit" style="padding: 10px 20px; background: #2575fc; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer;">Create Milestone</button>
            </div>
        </form>

    </div>
</div>
@endsection
