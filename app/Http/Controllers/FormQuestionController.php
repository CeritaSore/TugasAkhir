<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventForm;
use App\Models\EventType;
use App\Models\FormType;
use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FormQuestionController extends Controller
{
    public function index($form)
    {
        $question = EventForm::where('slug', $form)->first();
        $formtype = FormType::all();
        return view('organisasi.formquestion', compact('question', 'formtype'))->with('form', $form);
    }
    public function store(Request $request, $form)
    {
        $forms = EventForm::where('slug', $form)->first();
        $validation = $request->validate([
            'question' => 'required|array',
            'type' => 'required|array',
        ]);
        $inputquestion = array_filter($validation['question']);
        $inputtype = array_filter($validation['type']);
        $question = [];
        foreach ($inputquestion as $key => $quest) {
            $typeId = isset($inputtype[$key]) ? $inputtype[$key] : null;
            $question[] = Question::create([
                'question' => $quest,
                'form_id' => $forms->id,
                'type_id' => $inputtype[$key]
            ]);
        }

        $data = [
            'message' => 'form berhasil di simpan',
            'data' => [$question]
        ];
        return redirect()->route('show.event', $forms->event->slug)->with('success', $data['message']);
    }
    public function showform($form)
    {
        $question = EventForm::where('slug', $form)->first();
        $formtype = FormType::all();
        $getquestion = Question::where('form_id', $question->id)->get();
        // return  response()->json($getquestion);
        return view('organisasi.editquestion', compact('question', 'formtype', 'getquestion'));
        // $data  = [
        //     'message' => 'sukses mendapat data',
        //     'data' => $form
        // ];
    }
    public function updateForm(Request $request, $form)
    {
        // Temukan form berdasarkan slug
        $forms = EventForm::where('slug', $form)->first();

        // Pastikan form ditemukan
        if (!$forms) {
            return response()->json(['message' => 'Form tidak ditemukan'], 404);
        }

        // Validasi input
        $validation = $request->validate([
            'question' => 'required|array',
            'type' => 'required|array',
        ]);
        $filterquestions = array_filter($validation['question']);
        $findquestions = Question::where('form_id', $forms->id)->get();
        if ($findquestions->count() !== count($filterquestions)) {
            return response()->json(['message' => 'Jumlah pertanyaan tidak sesuai dengan data yang ada'], 400);
        }

        // Update setiap pertanyaan satu per satu
        foreach ($findquestions as $index => $findquestion) {
            $findquestion->question = $validation['question'][$index];
            $findquestion->type_id = $validation['type'][$index]; // Pastikan type juga diperbarui jika ada
            $findquestion->save();
        }

        return response()->json([
            'message' => 'Form berhasil diupdate',
            'data' => $findquestions
        ]);
    }
}
