
@extends('layouts.app')
@section('seat-edit')
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
        <form action="{{ route('seats.update', $seat->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="tiki-form-group">
                <label for="bus_id">Bus:</label>
     <select name="bus_id" class="tiki-form-control" required>
    @foreach ($buses as $bus)
        <option value="{{ $bus->id }}" {{ $seat->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->number }}</option>
    @endforeach
     </select>
                
            </div>

            <div class="tiki-form-group">
                <label for="seat_number">Seat Number:</label>
                <input type="text" name="seat_number" id="seat_number" class="tiki-form-control" value="{{ $seat->seat_number }}" required>
            </div>
            <div class="mb-3">
                <label for="status" >Status</label>
                <select class="form-control" id="seat-status" name="status" required>
                    <option value="available" {{ $seat->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ $seat->status == 'booked' ? 'selected' : '' }}>Booked</option>
                </select>
            </div>
            <div class="tiki-form-group">
                <button type="submit" class="btn btn-primary">Update Seat</button>
            </div>
        </form>
    </div>
</div>
@endsection
