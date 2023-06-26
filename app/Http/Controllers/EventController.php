<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Liaison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Event!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.events.index', [
            'events' => Event::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create', [
            'liaisons' => Liaison::get(),
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'liaison_id' => 'nullable',
            'date' => 'required',
            'time' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $image = $request->file('thumbnail');
        $image->storeAs('public/events', $image->hashName());

        Event::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'thumbnail' => $image->hashName(),
            'status' => $request->status,
            'liaison_id' => $request->liaison_id
        ]);

        return redirect()->route('events.index')->with('success', 'Event was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $liaisons = Liaison::get();
        $categories = Category::get();
        return view('admin.events.edit', compact('liaisons', 'event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'liaison_id' => 'nullable',
            'date' => 'required',
            'time' => 'required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $image->storeAs('public/events', $image->hashName());
            Storage::delete('public/events/' . $event->thumbnail);

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'date' => $request->date,
                'time' => $request->time,
                'thumbnail' => $image->hashName(),
                'status' => $request->status,
                'liaison_id' => $request->liaison_id
            ]);
        } else {
            $event->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
                'status' => $request->status,
                'liaison_id' => $request->liaison_id
            ]);
        }

        return redirect()->route('events.index')->with('success', 'Event was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        Storage::delete('public/events/' . $event->thumbnail);
        return redirect()->route('events.index')->with('success', 'Event was deleted!');
    }
}
