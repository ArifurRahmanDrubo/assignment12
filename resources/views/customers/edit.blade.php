@extends('layouts.app')
@section('customer-edit')
    
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
        <form action="{{ route('customers.update', $customer->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="tiki-form-group">
                <label for="name"> Name:</label>
                <input type="text" name="name" value="{{ $customer->name }}" id="name" class="tiki-form-control" value="{{ $customer->name }}" required>
            </div>

            <div class="tiki-form-group">
                <label for="number">Contact Number:</label>
                <input type="text" name="contact_number" value="{{ $customer->contact_number }}" id="contact_number" class="tiki-form-control" value="{{ $customer->number }}" required>
            </div>
            

            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Update Customers</button>
            </div>
        </form>
    </div>
</div>
@endsection
