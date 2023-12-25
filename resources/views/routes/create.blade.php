@extends('layouts.app')
@section('route-create')
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
        <form action="{{ route('routes.store') }}" method="post">
            @csrf
              
            <div class="tiki-form-group">
                @csrf
                <label for="bus_id">Bus:</label>
       <select name="bus_id" class="tiki-form-control" required>
         @foreach ($buses as $bus)
        <option value="{{ $bus->id }}">{{ $bus->number }}</option>
         @endforeach
      </select>   
            </div>

            <div class="tiki-form-group">
                <label for="source">Source:</label>
                <input type="text" name="source"  class="tiki-form-control" required>
            </div>
            <div class="tiki-form-group">
                <label for="destination">Destination:</label>
                <input type="text" name="destination"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="text" name="cost"  class="tiki-form-control" required>
            </div>
            <div class="tiki-form-group">
                <label for="departure_date">Departure Date:</label>
                <input type="date" name="departure_date"  class="tiki-form-control" required>
            </div>
            <div class="tiki-form-group">
                <label for="departure_time">Departure Time:</label>
                <input type="time" name="departure_time"  class="tiki-form-control" required>
            </div>

            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Add Route</button>
            </div>
        </form>
    </div>
</div>
@endsection
