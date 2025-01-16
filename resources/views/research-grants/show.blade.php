@extends('layouts.app')

@section('title', 'Research Grant Details')

@section('content')
<h1>Research Grant Details</h1>
<p><strong>Title:</strong> {{ $researchGrant->title }}</p>
<p><strong>Project Leader:</strong> {{ $researchGrant->leader->name }}</p>
<p><strong>Amount:</strong> {{ $researchGrant->amount }}</p>
<p><strong>Provider:</strong> {{ $researchGrant->provider }}</p>
<p><strong>Start Date:</strong> {{ $researchGrant->start_date }}</p>
<p><strong>Duration (Months):</strong> {{ $researchGrant->duration_months }}</p>
<h2>Members:</h2>
<ul>
    @foreach($researchGrant->members as $member)
        <li>{{ $member->name }}</li>
    @endforeach
</ul>
<a href="{{ route('research-grants.index') }}">Back to List</a>
@endsection
