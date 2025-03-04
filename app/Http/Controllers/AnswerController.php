<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FormAnswer;
use App\Models\FormQuestion;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $getanswer = FormAnswer::all();
        return response()->json([
            'message' => 'Hello World',
            'data ' => $getanswer
        ]);
    }
    public function storeAnswer(Request $request, $slug)
    {
        $validation = $request->validate([
            'answer' => 'required|array',
            'answer.*' => 'required|string'
        ]);
        $event = Event::where('slug', $slug)->first();
        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }
        $dataJawaban = [];
        foreach ($validation['answer'] as $form_id => $jawaban) {
            $question = FormQuestion::find($form_id); 

            if ($question) {
                $dataJawaban[] = FormAnswer::create([
                    'jawaban' => $jawaban,
                    'form_id' => $form_id,
                    'event_id' => $event->id,
                    'type_id' => $event->type_id, 
                ]);
            }
        }
        return response()->json([
            'message' => 'Jawaban berhasil disimpan',
            'data' => $dataJawaban
        ]);
    }
}
