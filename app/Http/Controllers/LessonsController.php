<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\lesson;
use Illuminate\Support\Facades\Response;
use App\files\transformers\LessonTransformer;
use Illuminate\Validation\Validator;

class LessonsController extends Controller
{
    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;

    }

    public function index(Request $request)
    {
        $limit=$request->limit?:3;

        $lessons = lesson::paginate($limit);
//        dd(get_class_methods($lessons));
        return Response::json([
            'data' => $this->lessonTransformer->transformCollection($lessons->all()),
            'pagination'=>[
                'total_count'=>$lessons->total(),
                'total_pages'=>ceil($lessons->total() / $lessons->perPage()),
                'current_page'=>$lessons->currentPage(),
                'limit'=>$lessons->perPage()
            ]
        ], 200);
    }

    public function show($id)
    {
        $lesson = lesson::find($id);
        if ($lesson) {
            return Response::json([
                'data' => $this->lessonTransformer->transform($lesson)
            ], 200);
        }

        return Response::json([
            'errors' => 'data not found'
        ], 404);
    }

    public function store(Request $request)
    {
        if(!$request->title || !$request->description)
        {
            return Response::json(['result'=>'error'],404);
        }
        lesson::create($request->all());
        return Response::json(['result'=>'data added successfully'],200);
    }


}
