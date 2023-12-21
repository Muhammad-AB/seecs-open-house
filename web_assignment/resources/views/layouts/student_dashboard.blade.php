@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{-- auth()->user()->name --}}</h1>

        <h2>Project Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{-- $project->name --}}</h5>
                <p class="card-text">Description: {{-- $project->description --}}</p>
                <p class="card-text">Group Members: {{-- implode(', ', $project->groupMembers->pluck('name')->toArray()) --}}</p>
                <p class="card-text">Category: {{-- $project->category --}}</p>
                <p class="card-text">Location: {{-- $project->location --}}</p>
                <p class="card-text">Status: {{-- $project->status --}}</p>--
                <a href="{{-- route('editProjectForm', ['id' => $project->id]) --}}" class="btn btn-primary">Edit Project</a>
            </div>
        </div>

        <h2>Evaluation Status</h2>

        <div class="card">
            <div class="card-body">
                <p>Total Evaluators: 3</p>
                <p>Evaluators Marked: {{-- $evaluatorsMarkedCount --}}</p>
                <p>Total Marks: {{-- $totalMarks --}}</p>
            </div>
        </div>
    </div>
@endsection
