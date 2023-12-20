@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Project Details</h2>

        <form method="POST" action="{{ route('updateProject', ['id' => $project->id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="project_name" class="form-label">Project Name:</label>
                <input type="text" id="project_name" name="project_name" class="form-control" value="{{ $project->name }}">
            </div>

            <div class="mb-3">
                <label for="project_description" class="form-label">Project Description:</label>
                <textarea id="project_description" name="project_description" class="form-control">{{ $project->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="project_category" class="form-label">Project Category:</label>
                <input type="text" id="project_category" name="project_category" class="form-control" value="{{ $project->category }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>
@endsection
