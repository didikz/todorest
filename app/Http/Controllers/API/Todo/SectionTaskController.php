<?php

namespace App\Http\Controllers\API\Todo;

use App\Http\Controllers\Controller;
use App\Http\Resources\Section;
use App\Models\Task;
use Illuminate\Http\Request;

class SectionTaskController extends Controller
{
    public function index(Request $request, Section $section)
    {
        
    }

    public function show(Section $section, Task $task)
    {

    }
}
