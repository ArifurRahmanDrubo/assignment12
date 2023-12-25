@extends('layouts.app')
@section('route-index')
<div class="tiki-container">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
    @endif

    
    <div class="tiki-indexcard">
        <div class="tiki-header">
            <h2>Route Status</h2>
        </div>
        <span class="tiki-add-button">
            <a href="{{ route('routes.create') }}">Add Route</a>
        </span>

    <table class="tiki-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bus Number</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Departure Date</th>
                <th>Departure Time</th>
                <th>Cost</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($routes as $route)
            <tr>
                <td>{{ $route->id }}</td>
                <td>{{ $route->bus->number }}</td>
                <td>{{ $route->source }}</td>
                <td>{{ $route->destination }}</td>
                <td>{{ $route->departure_date }}</td>
                <td>{{ $route->departure_time }}</td>
                <td>{{ $route->cost }}</td>
                <td>
                    <a href="{{ route('routes.edit', $route->id) }}">Edit</a>
                    <form action="{{ route('routes.destroy', $route->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
