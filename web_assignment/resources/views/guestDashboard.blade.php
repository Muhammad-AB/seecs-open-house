@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Assigned Projects</h2>

        @forelse($assignedProjects as $project)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->projectLocation }}</p>
                    <p class="card-text">{{ $project->projectMarks }}</p>
                    <a href="{{ route('project.show', ['id' => $project->id]) }}" class="btn btn-primary">View Project</a>
                </div>
            </div>
        @empty
            <p>Projects have not yet been assigned</p>
        @endforelse
    </div>
@endsection
