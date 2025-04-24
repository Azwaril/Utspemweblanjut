<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index() {
        $events = Event::all();
        return view('home', compact('events'));
    }

 
    public function show($id) {
        $event = Event::with('tickets', 'reviews')->findOrFail($id);
        return view('event_detail', compact('event'));
    }


    public function listEvents() {
        $events = Event::all();
        return view('events.index', compact('events'));
    }


    public function create() {
        return view('admin.add_event');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'ticket_category' => 'required',
            'ticket_price' => 'required|numeric',
            'ticket_stock' => 'required|integer',
        ]);
    
        // Upload Gambar
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    
        // Simpan Event
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'image' => $imageName
        ]);
    
        // Simpan Tiket
        Ticket::create([
            'event_id' => $event->id,
            'category' => $request->ticket_category,
            'price' => $request->ticket_price,
            'stock' => $request->ticket_stock
        ]);
    
        return redirect('/events')->with('success', 'Event dan Tiket berhasil ditambahkan!');
    }
    
}
