<?php

namespace App\Http\Controllers\API\Todo;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\Task as TaskResource;

class SectionTaskController extends Controller
{
    /**
     * @param Request $request
     * @param Section $section
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, Section $section)
    {
        return TaskResource::collection($section->tasks()->paginate(10));
    }

    /**
     * @param Section $section
     * @param Task $task
     * @return TaskResource
     */
    public function show(Section $section, Task $task)
    {
        return new TaskResource($task);
    }
}
