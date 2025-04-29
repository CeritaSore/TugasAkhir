<?php

namespace App\Http\Controllers;

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
        if ($validation['namaform'] === "Registration Form") {
            EventForm::create([
                'nama_form' => $validation['namaform'],
                'event_id' => $validation['eventid']
            ]);
            return response('registrasi berhasil dibuat');
        } elseif ($validation['namaform'] === "Feedback Form") {
            EventForm::create([
                'nama_form' => $validation['namaform'],
                'event_id' => $validation['eventid']
            ]);
            return response('feedback berhasil dikirim');
        }

        return response($validation);
    }
}
