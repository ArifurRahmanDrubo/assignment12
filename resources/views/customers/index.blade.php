@extends('layouts.app')
@section('customer-index')
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
            <h2>Customer Status</h2>
        </div>
        <span class="tiki-add-button">
            <a href="{{ route('customers.create') }}">Add Customer</a>
        </span>
    <table class="tiki-table">
        <thead>
            <tr>
                <th>Customer Id</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->customer_id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->contact_number }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
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