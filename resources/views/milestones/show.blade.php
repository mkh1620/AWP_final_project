@extends('layouts.app')

@section('title', 'Milestone Details')

@section('content')
<h1>Milestone Details</h1>
<p><strong>Milestone Name:</strong> {{ $milestone->name }}</p>
<p><strong>Target Date:</strong> {{ $milestone->target_date }}</p>
<p><strong>Status:</strong> {{ $milestone->status }}</p>
<p><strong>Research Grant:</strong> {{ $milestone->grant->title }}</p>
<p><strong>Remarks:</strong> {{ $milestone->remarks }}</p>
<a href="{{ route('milestones.index') }}">Back to List</a>
@endsection
