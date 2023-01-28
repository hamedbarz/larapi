<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\CoursePrivateException;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Resources\Api\v1\Course as CourseResource;
use App\Http\Resources\Api\v1\CourseCollection;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::paginate(2);
        //return response()->json($course);
        return new CourseCollection($course);
        //return new CourseCollection($course);
    }

    public function single(Course $course)
    {
        throw new CoursePrivateException();
        //$course = Course::where('id');
        //return response()->json($course);
        //return new CourseResource($course);
        //return new CourseCollection($course);
    }
}
