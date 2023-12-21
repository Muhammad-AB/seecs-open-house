@extends('app')

@section('content')
    <div class="container">
        @if(auth()->check())
            <h1>Welcome, {{ auth()->user()->name }}</h1>
        @else
            <h1>Welcome, Guest</h1>
        @endif

        <h2>Assigned Projects</h2>

       @forelse($projects as $project)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Title:{{ $project->name }}</h5>
                    <p class="card-text">Location{{ $project->location->name }}</p>
                    <p class="card-text">Marks: {{ $project->projectMarks }}</p>
                    <a href="{{ route('eval.project', ['id' => $project->id]) }}" class="btn btn-primary">View Project</a>
                </div>
            </div>
        @empty
            <p>Projects have not yet been assigned</p>
        @endforelse

        <form method="POST" action="{{route('dashboard')}}" class="mt-4">
            @csrf

    
            <div class="mb-3 bg-light">
                <h3>Select Speciality</h3>

                <label for="specialty">Select Specialty:</label>
                <select id="specialty" name="specialty" class="form-select">
                    <option value="electronics_specialty">Electronics</option>
                    <option value="digitalsystems_speciality">Digital Systems</option>
                    <option value="databaseSystems_speciality">Database Systems</option>
                    <option value="dataScience_speciality">Data Science</option>
                    <option value="cybersecurity_speciality">Cybersecurity</option>
                    <option value="computerNetwors_speciality">Computer Networks</option>
                    <option value="softwareEngineering_speciality">Softwaer Engineering</option>
                    <option value="computerVision_speciality">Computer Vision</option>
                    <option value="cloudComputing_speciality">Cloud Computing</option>
                    <option value="webDevelopment_speciality">Web Development</option>
                    <option value="embeddedSystems_speciality">Embedded Systems</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Preferences</button>
        </form>
    </div>
@endsection
