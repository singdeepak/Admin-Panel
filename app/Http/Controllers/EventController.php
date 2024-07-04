<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function eventIndex()
    {
        $events = Event::orderBy('id', 'desc')->paginate(10);
        return view('admin.event-index', compact('events'));
    }

    public function createEvent()
    {
        $users = User::get();
        return view('admin.event-create', compact('users'));
    }

    public function storeEvent(Request $request)
    {
        try {
            $rules = [
                'event_title' => 'required|string|max:255',
                'event_short_desc' => 'required|string|max:500',
                'event_long_desc' => 'required|string',
                'event_date' => 'required|date',
                'added_date' => 'required|date',
                'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            // Handle the file upload
            if ($request->hasFile('event_image')) {
                $image = $request->file('event_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/events'), $imageName);
            } else {
                return redirect()->back()->with('error', 'Image file not found.');
            }

            // Create a new event
            $event = new Event();
            $event->event_title = $request->input('event_title');
            $event->event_short_desc = $request->input('event_short_desc');
            $event->event_long_desc = $request->input('event_long_desc');
            $event->event_date = $request->input('event_date');
            $event->added_by = $request->input('added_by');
            $event->added_date = $request->input('added_date');
            $event->event_image = $imageName;
            $event->save();
            session()->flash('message', ['type' => 'success', 'content' => 'Event created successfully!']);
            return redirect()->route('event.index');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([$e->getMessage()], 500);
        }
    }

    public function editEvent($id)
    {
        $event = event::find($id);
        return view('admin.event-edit', compact('event'));
    }

    public function updateEvent(Request $request, $id)
    {
        $event = event::find($id);
        if ($event) {
            try {
                $rules = [
                    'event_title' => 'required|string|max:255',
                    'event_short_desc' => 'required|string|max:500',
                    'event_long_desc' => 'required|string',
                    'event_date' => 'required|date',
                    'added_date' => 'required|date',
                    'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
                ];
                $validator = Validator::make($request->all(),$rules);
                if ($validator) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }


                // Handle the file upload
                if ($request->hasFile('event_image')) {
                    $image = $request->file('event_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/events'), $imageName);
                } else {
                    return redirect()->back()->with('error', 'Image file not found.');
                }

                // Create a new event
                $event->event_title = $request->input('event_title');
                $event->event_short_desc = $request->input('event_short_desc');
                $event->event_long_desc = $request->input('event_long_desc');
                $event->event_date = $request->input('event_date');
                $event->added_by = $request->input('added_by');
                $event->added_date = $request->input('added_date');
                $event->event_image = $imageName;
                $event->save();
                session()->flash('message', ['type' => 'success', 'content' => 'Event updated successfully!']);
                return redirect()->route('event.index');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return response()->json([$e->getMessage()], 500);
            }
        } else {
            return redirect()->route('event.index')->with('success', 'Id not found.');
        }
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if ($event->delete()) {
            session()->flash('message', ['type' => 'success', 'content' => 'Event deleted successfully!']);
            return redirect()->route('event.index');
        } else {
            return redirect()->back()->with('success', 'Event can not be deleted..!');
        }
    }
}
