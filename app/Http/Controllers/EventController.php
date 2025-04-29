<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventForm;
use App\Models\EventType;
use App\Models\OrganizationProgram;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::where('is_deleted', false)->get();
        $eventTypes = EventType::all();
        $proker = OrganizationProgram::all();
        // return response()->json($event);
        return view('organisasi.kegiatan', compact('event', 'eventTypes', 'proker'));
    }
    public function storeEvent(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'type_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'proker' => 'required'
        ]);
        $slug = Event::slugTitle($request->nama);
        $createEvent = Event::create([
            'nama' => $validation['nama'],
            'deskripsi' => $validation['deskripsi'],
            'type_id' => $validation['type_id'],
            'tanggal_mulai' => $validation['tanggal_mulai'],
            'tanggal_selesai' => $validation['tanggal_selesai'],
            'proker_id' => $validation['proker'],
            'slug' => $slug
        ]);
        $data = [
            "message" => "Acara berhasil tersimpan",
            "data" => $createEvent
        ];
        // return response()->json($data);
        return redirect()->route('organisasi.acara')->with('success', $data['message']);
    }
    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $eventTypes = EventType::all();
        $proker = OrganizationProgram::all();
        $registform = EventForm::where('event_id', $event->id)->where('nama_form', 'Registration Form')->first();
        $feedbackform = EventForm::where('event_id', $event->id)->where('nama_form', 'Feedback Form')->first();
        return view('organisasi.eventdetail', compact('event', 'eventTypes', 'proker', 'registform', 'feedbackform'));
    }
    public function updateEvent(Request $request, $slug)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'type_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'proker' => 'required'
        ]);
        $getEvent = Event::where('slug', $slug)->first();
        $getEvent->nama = $validation['nama'];
        $getEvent->deskripsi = $validation['deskripsi'];
        $getEvent->type_id = $validation['type_id'];
        $getEvent->tanggal_mulai = $validation['tanggal_mulai'];
        $getEvent->tanggal_selesai = $validation['tanggal_selesai'];
        $getEvent->proker_id = $validation['proker'];
        $getEvent->slug = Event::slugTitle($validation['nama']);
        $getEvent->save();
        $data = [
            "message" => "data berhasil di perbarui",
            "data" => $getEvent
        ];
        // return response()->json($data);
        return redirect()->route('show.event', $getEvent->slug)->with('succcess', $data['message']);
    }
    public function deleteEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $event->is_deleted = true;
        $event->save();
        $data = [
            "message" => "event dihapus",
        ];
        // return response()->json($data);
        return redirect()->route('organisasi.acara')->with('success', $data['message']);
    }
}
