<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // --- 1. CRUD: Read (Index) ---
    public function index()
    {
        // 1. CRUD: Fetch all events
        $events = Event::orderBy('date')->get(); 

        // 2. MVC: Return the list view (resources/views/events/index.blade.php)
        return view('events.index', compact('events'));
    }

    // --- 1. CRUD: Create (Show Form) ---
    public function create()
    {
        // 2. MVC: Return the creation form view (resources/views/events/create.blade.php)
        return view('events.create');
    }

    // --- 1. CRUD: Create (Store Data) ---
    public function store(Request $request)
    {
        // Validation (Essential for data integrity)
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date|after_or_equal:today', // 7. Dates
            'start_time' => 'required|date_format:H:i',     // 6. Timing of events
            'end_time' => 'required|date_format:H:i|after:start_time',
            'food_option' => 'required|in:Vegetarian,Non-Vegetarian,Vegan', // 4. Food
            'price' => 'required|numeric|min:0',            // 3. Payment Option (Price)
            'sangeet_details' => 'nullable|string|max:500', // 5. Sangeet
        ]);

        // 1. CRUD: Create the event record
        Event::create($request->all());

        // Redirect with a success message
        return redirect()->route('events.index')
                         ->with('success', 'Event created successfully!');
    }

    // --- 1. CRUD: Read (Show Single) ---
    // Uses Route Model Binding to automatically find the Event by ID
    public function show(Event $event)
    {
        // 2. MVC: Return the single event view (resources/views/events/show.blade.php)
        return view('events.show', compact('event'));
    }

    // --- 1. CRUD: Update (Show Form) ---
    public function edit(Event $event)
    {
        // 2. MVC: Return the edit form view (resources/views/events/edit.blade.php)
        return view('events.edit', compact('event'));
    }

    // --- 1. CRUD: Update (Save Data) ---
    public function update(Request $request, Event $event)
    {
        // Validation (Same as store)
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date|after_or_equal:today', 
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'food_option' => 'required|in:Vegetarian,Non-Vegetarian,Vegan',
            'price' => 'required|numeric|min:0',
            'sangeet_details' => 'nullable|string|max:500',
        ]);

        // 1. CRUD: Update the event record
        $event->update($request->all());

        return redirect()->route('events.index')
                         ->with('success', 'Event updated successfully!');
    }

    // --- 1. CRUD: Delete ---
    public function destroy(Event $event)
    {
        // 1. CRUD: Delete the event record
        $event->delete();

        return redirect()->route('events.index')
                         ->with('success', 'Event deleted successfully!');
    }
}