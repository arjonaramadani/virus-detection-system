<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Respondent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::orderBy('created_at', 'desc')->get();
        
        return $surveys->map(function ($s) {
            return [
                'id' => $s->id,
                'iAnketuari' => $s->respondent->name,
                'kontrolluarNga' => $s->checkedBy ? $s->checkedBy->name : null,
                'shenime' => $s->notes,
                'Data' => $s->created_at->toCookieString()
            ];
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::find($id);

        return [
            'id' => $survey->id,
            'respondent' => $survey->respondent->name,
            'respondent_phone' => $survey->respondent->phone_number,
            'checked_by' => $survey->checkedBy ? $survey->checkedBy->name : null,
            'notes' => $survey->notes,
            'answers' => $survey->answers,
            'created_at' => $survey->created_at->toCookieString()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->data['name'];
        $respondent = Respondent::create([
            'name' => $request->data['name'],
            'phone_number' => $request->data['phone'],
            'created_at' => now()
        ]);

        $survey = Survey::create([
            'respondent_id' => $respondent->id,
            'created_at' => now(),
        ]);

        foreach ($request->data['answers'] as $ans) {
            DB::table('survey_questions')->insert([
                    'survey_id' => $survey->id,
                    'question_id' => $ans['id'],
                    'answer' => $ans['answer']
                ]);
        }

        return "success";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);
        $survey->checked_by = $request->user()->id;
        $survey->notes = $request->notes;
        $survey->update();

        return "Success";
    }
}
