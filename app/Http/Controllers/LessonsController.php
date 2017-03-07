<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\lifecanvas\transformers\LessonsTransformer;

class LessonsController extends ApiController
{
    /**
     * @var LessonsTransformer
     */
    protected $lessonTransformer;

    /**
     * LessonsController constructor.
     * @param LessonsTransformer $lessonTransformer
     */
    function __construct(LessonsTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;

        $this->middleware('auth.basic', ['only' => 'store']);
    }

    /**
     * Return all lessons in json format.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $lessons = Lesson::all();


        if (! $lessons) {
            return $this->responseNotFound('No lessons available yet.');
        }

        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a new lesson in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Lesson input verification section.
        if( ! $request->input('title'))
        {
            return $this->responseValidationError('Parameters failed validation.');
        }

        Lesson::create($request->all());
        return $this->responseAddSuccess('Lesson added successfully.');
    }

    /**
     * Return a single lesson in json format.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Lesson $lesson
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (! $lesson)
        {
            return $this->responseNotFound('Lesson does not exist.');
        }
        return $this->respond(['data' => $this->lessonTransformer->transform($lesson)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
