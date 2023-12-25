@extends('layouts.app')

@section('route-edit')
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

    <div class="tiki-card">
        <form action="{{ route('routes.update', $route->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="tiki-form-group">
                <label for="bus_id">Bus:</label>
     <select name="bus_id" class="tiki-form-control" required>
    @foreach ($buses as $bus)
        <option value="{{ $bus->id }}" {{ $route->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->number }}</option>
    @endforeach
     </select>
                
            </div>

            <div class="tiki-form-group">
                <label for="source">Source:</label>
                <input type="text" name="source" id="source" class="tiki-form-control" value="{{ $route->source }}" required>
            </div>
            <div class="tiki-form-group">
                <label for="destination">Destination:</label>
                <input type="text" name="destination" id="destination" class="tiki-form-control" value="{{ $route->destination }}" required>
            </div>
            <div class="tiki-form-group">
                <label for="cost">Cost:</label>
                <input type="text"  name="cost"  id="cost" class="tiki-form-control" value="{{ $route->cost }}" required>
            </div>
            <div class="tiki-form-group">
                <label for="departure_date">Departure Date:</label>
                <input type="date" name="departure_date"  class="tiki-form-control" value="{{ $route->departure_date }}" required>
            </div>
            <div class="tiki-form-group">
                <label for="departure_time">Departure Time:</label>
                <input type="time" name="departure_time"  class="tiki-form-control" value="{{ $route->departure_time }}" required>
            </div>

            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Update Route</button>
            </div>
        </form>
    </div>
</div>
@endsection