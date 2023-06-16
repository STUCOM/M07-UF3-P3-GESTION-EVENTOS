<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'location' => 'required',
        ]);
    
        $event = new Event();
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->user_id = Auth::id();
        $event->save();
    
        return redirect('/events')->with('success', 'Event created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::with('attendees')->findOrFail($id);
        return view('events.show', compact('event'));
    }
    
    public function edit($id)
    {
        $event = Event::find($id);
        // esta linea de abajo es para que no se pueda editar un evento que no sea del usuario logueado
        return view('events.edit', ['event' => $event]);
    }


    public function update(Request $request, $id)
    {
        // validamos los campos como title o date para que sean obligatorios
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);
        // buscamos el evento por id y cambiamos los valores
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->location = $request->input('location');
        $event->description = $request->input('description');
        $event->save(); //guardamos y redireccionamos
    
        return redirect()->route('events.show', $event->id);
    }
    
    
    public function register($id)
    {
        $event = Event::findOrFail($id);
        return view('events.register', compact('event'));
    }


    
    public function storeAttendee($idEvent, Request $request)
    {
        $event = Event::find($idEvent);
    
        $attendee = new UserEventsAttendee();
        $attendee->user_id = auth()->user()->id;
        $attendee->event_id = $event->id;
        $attendee->name = $request->input('name');
        $attendee->email = $request->input('email');
        $attendee->save();
    
        return redirect()->route('events.show', $event->id);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->attendees()->detach(); // elimina todas las relaciones con asistentes
        $event->delete(); // elimina el evento en sí
        return back()->with('status', 'El evento ha sido eliminado exitosamente');
    }
}