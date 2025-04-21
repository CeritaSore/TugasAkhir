<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FormQuestion;
use Illuminate\Http\Request;

class FormQuestionController extends Controller
{
    public function index($slug)
    {
        $getquestion = FormQuestion::all();
        return response()->json($getquestion);
    }
    public function storeForm(Request $request, $slug)
    {
        $validation = $request->validate([
            'question.*' => 'required',
            'inputType' => 'required',
        ]);
        $question = [];
        $event = Event::where('slug', $slug)->first();
        foreach ($validation['question'] as $index => $value) {
            $createData = FormQuestion::create([
                'question' => $value,
                'event_id' => $event->id,
                'type_id' => $event->type_id,
                'input_type' => $validation['inputType'],
            ]);
            $question[] = $createData;
        }


        $data = [
            'message' => 'success',
            'data' => $question,
        ];
        return response()->json($data);
    }
    public function updateForm(Request $request, $slug)
    {
        $validation = $request->validate([
            'question' => 'nullable|array',
            'question.*' => 'sometimes|required|string',
            'inputType' => 'sometimes|required|string',
        ]);
        $data = [];
        foreach ($validation['question'] as $index => $value) {
            $question = FormQuestion::where('id', $index)->first();
            if ($question) {
                $question->update([
                    'question' => $value,
                    'input_type' => $validation['inputType'],
                ]);
                $data[] = $question;
            }
        }
        return response()->json([
            'message' => 'success update',
            'data' => $data,
        ]);
    }
    public function deleteForm($slug, $id)
    {
        $getid = FormQuestion::find($id)->delete();
        $data = [
            'message' => 'success delete',
            'data' => $getid,
        ];
        return response()->json($data);
    }
}
