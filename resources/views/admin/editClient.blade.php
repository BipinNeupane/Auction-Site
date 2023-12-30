@extends('admin.master')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('update-client', ['id' => $client->id]) }}">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $client->name }}" required>
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $client->email }}" required>
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password">New Password:</label>
        <input type="password" name="password">
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation">Confirm New Password:</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">Update</button>
</form>
</div>
</div>
</div>

@endsection