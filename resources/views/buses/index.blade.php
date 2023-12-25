@extends('layouts.app')
@section('buses-index')
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
            <h2>Bus Status</h2>
        </div>
        <span class="tiki-add-button">
            <a href="{{ route('buses.create') }}"> Add Bus</a>
        </span>
            <table class="tiki-table"> 
                <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>Bus Name</th>
                        <th>Bus Number</th>
                        <th>Total Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buses as $bus)
                        <tr>
                            <td>{{ $bus->id }}</td>
                            <td>{{ $bus->name }}</td>
                            <td>{{ $bus->number }}</td>
                            <td>{{ $bus->seats }}</td>
        
                         
                            <td>
                                <a href="{{ route('buses.edit', $bus->id) }}"><span class="tiki-icon">&#9998;</span> Edit</a>
                                <a href="{{ route('buses.destroy', $bus->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $bus->id }}').submit();"><span class="tiki-icon">&#128465;</span> Delete</a>
                                <form id="delete-form-{{ $bus->id }}" action="{{ route('buses.destroy', $bus->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
</div>
@endsection

