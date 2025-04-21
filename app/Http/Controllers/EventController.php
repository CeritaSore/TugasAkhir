<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return response()->json($event);
    }
    public function storeEvent(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'type_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'organisasi_id' => 'required'
        ]);
        $slug = Event::slugTitle($request->nama);
        $createEvent = Event::create([
            'nama' => $validation['nama'],
            'deskripsi' => $validation['deskripsi'],
            'type_id' => $validation['type_id'],
            'tanggal_mulai' => $validation['tanggal_mulai'],
            'tanggal_selesai' => $validation['tanggal_selesai'],
            'organisasi_id' => $validation['organisasi_id'],
            'slug' => $slug
        ]);
        $data = [
            "message" => "success",
            "data" => $createEvent
        ];
        return response()->json($data);
    }
    public function updateEvent(Request $request, $slug)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'type_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'organisasi_id' => 'required'
        ]);
        $getEvent = Event::where('slug', $slug)->first();
        $getEvent->nama = $validation['nama'];
        $getEvent->deskripsi = $validation['deskripsi'];
        $getEvent->type_id = $validation['type_id'];
        $getEvent->tanggal_mulai = $validation['tanggal_mulai'];
        $getEvent->tanggal_selesai = $validation['tanggal_selesai'];
        $getEvent->organisasi_id = $validation['organisasi_id'];
        $getEvent->slug = Event::slugTitle($validation['nama']);
        $getEvent->save();
        $data = [
            "message" => "success",
            "data" => $getEvent
        ];
        return response()->json($data);
    }
    public function deleteEvent($slug)
    {
        $data = [
            "message" => "data dihapus",
            "data" => Event::where('slug', $slug)->delete()
        ];
        return response()->json($data);
    }
}
