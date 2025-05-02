<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventForm;
use Illuminate\Http\Request;

class EventFormController extends Controller
{
    public function storeform(Request $request)
    {
        $validation = $request->validate([
            'namaform' => 'required',
            'eventid' => 'required'
        ]);
        $slug = EventForm::slugging($validation['namaform']);
        $eventForm = Event::where('id', $validation['eventid'])->first();
        if ($validation['namaform'] === "Registration Form") {
            EventForm::create([
                'nama_form' => $validation['namaform'],
                'event_id' => $validation['eventid'],
                'slug' => $slug

            ]);
            return redirect()->route('show.event', $eventForm->slug)->with('success', 'Form Registrasi Berhasil Dibuat');
        } elseif ($validation['namaform'] === "Feedback Form") {
            EventForm::create([
                'nama_form' => $validation['namaform'],
                'event_id' => $validation['eventid'],
                'slug' => $slug
            ]);
            return redirect()->route('show.event', $eventForm->slug)->with('success', 'Form Feedback Berhasil Dibuat');
        }
        return response()->json($eventForm);
    }
}
