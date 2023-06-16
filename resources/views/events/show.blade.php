@extends('layouts.app')

@section('content')
<div>
    <h1>{{ $event->title }}</h1>
    <div>
        <div>
            <div>
                <div>
                    <h4>Event Details</h4>
                    <p><strong>Date:</strong> {{ $event->date }}</p>
                    <p><strong>Location:</strong> {{ $event->location }}</p>
                    <p><strong>Description:</strong> {{ $event->description }}</p>
                </div>
            </div>
            <a href="/events/{{ $event->id }}/register">Register Attendee</a>
            <a href="{{ route('events.index') }}">Back to Events</a>
        </div>
        <div>
            <div>
                <div>
                    <h4>Attendees ({{ count($event->attendees) }})</h4>
                    @if(count($event->attendees) > 0)
                    <ul>
                        @foreach($event->attendees as $attendee)
                        <li>{{ $attendee->pivot->name }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p>No attendees found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
