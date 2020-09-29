<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::orderBy('created_at','desc')->get();
        
        return $surveys->map(function ($s) {
            return [
                'id' => $s->id,
                'respondent' => $s->respondent->name,
                'checked_by' => $s->checkedBy->name,
                'notes' => $s->notes,
                'created_at' => $s->created_at->toCookieString()
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
            'checked_by' => $survey->checkedBy->name,
            'notes' => $survey->notes,
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
        return $request;

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
