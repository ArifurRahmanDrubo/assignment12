


@extends('layouts.app')
@section('seat-create')
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
        <form action="{{ route('seats.store') }}" method="post">
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
                <label for="seat_number">Seat Number:</label>
                <input type="text" name="seat_number"  class="tiki-form-control" required>
            </div>
            <div class="tiki-form-group">
                <label for="status" >Status</label>
                <select class="tiki-form-control" id="seat-status" name="status" required>
                    <option value="available" >Available</option>
                    <option value="booked" >Booked</option>
                </select>
            </div>
            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Add Seats</button>
            </div>
        </form>
    </div>
</div>
@endsection