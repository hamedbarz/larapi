<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\CoursePrivateException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Http\Resources\Api\v1\Course as CourseResource;
use App\Http\Resources\Api\v1\CourseCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
        //throw new CoursePrivateException();
        //$course = Course::where('id');
        //return response()->json($course);
        return new CourseResource($course);
        //return new CourseCollection($course);
    }

    public function store(CourseRequest $request)
    {
//        $this->validate($request , [
//            'title' => 'required|unique:courses|max:255',
//            'body' => 'required'
//        ]);

//        $validate = Validator::make((array)$request, [
//            'title' => 'required|max:10|unique:Course|min:3',
//            'body' => 'required'
//        ]);

//        if($validate->fails()){
//            return response([
//                'data' => $validate->errors(),
//                'status' => 'error'
//            ], \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
//        }

        return response([
            'data' => [],
            'status' => 'success'
        ],\Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
