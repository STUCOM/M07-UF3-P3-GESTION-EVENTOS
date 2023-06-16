@extends('layouts.app')

@section('content')
<div>
    <h1>Register Attendee</h1>
    <form method="POST" action="{{ route('attendees.store', ['id' => $event->id]) }}">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email address</label>
            <input type="email"id="email" name="email" required>
        </div>
        <button type="submit">Register</button>
    </form>
</div>
@endsection