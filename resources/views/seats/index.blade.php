@extends('layouts.app')
@section('seat-index')
<div class="tiki-seatcontainer">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
    @endif
    
    <div class="tiki-search">
        <div class="tiki-add-container">
        <div class="tiki-addbutton">
            <a href="{{ route('seats.create') }}">Add Seats</a>
        </div>
        </div>
         
           <div class="tiki-search-container">
           <form action="{{ route('seats.index') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="bus_number" ></label>
                <input type="text" class="tiki-search-input" placeholder="Enter Bus Number"  id="bus_number" name="bus_number" required>
                <button type="submit" class="tiki-search-button">Show Seats</button>
            </div>        
        </form>
    </div>
        
    </div>
   
  
    <div class="tiki-seat-header">
       
        @if(isset($bus) && isset($maxSeats) && isset($seats))
        <h3>Seats for Bus Number: {{ $bus->number }}</h3>
        <p>Total Seats: {{ $maxSeats }}</p>
       
        <table class="tiki-table tiki-table-bordered">
            <thead>
                <tr>
                    <th>Seat Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seats as $seat)
                    <tr>
                        <td>{{ $seat->seat_number }}</td>
                        <td>{{ $seat->status }}</td>
                        <td>
                            <a href="{{ route('seats.edit', $seat->id) }}">Edit</a>
                            <form action="{{ route('routes.destroy', $seat->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
     </div>
   

    
</div>
@endsection