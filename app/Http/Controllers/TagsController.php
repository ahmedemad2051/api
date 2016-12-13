<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\lesson;
use App\Tag;
use Illuminate\Support\Facades\Response;
use App\files\transformers\TagTransformer;

class TagsController extends Controller
{
    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer=$tagTransformer;
    }

    public function index($lessonId=null)
    {
        $tags=$lessonId ? lesson::findOrFail($lessonId)->tags : Tag::all();

        return Response::json([
            'data'=>$this->tagTransformer->transformCollection($tags->all())
        ]);
    }
}
