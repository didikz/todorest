<?php

namespace App\Http\Controllers\API\Todo;

use App\Actions\Todo\CreateSectionService;
use App\Actions\Todo\UpdateSectionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Todo\CreateSectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Resources\Section as SectionResource;

class SectionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $sections = $request->user()->sections()->paginate(10);
        return SectionResource::collection($sections);
    }

    /**
     * @param CreateSectionRequest $request
     * @param CreateSectionService $createSectionService
     * @return SectionResource
     */
    public function store(CreateSectionRequest $request, CreateSectionService $createSectionService)
    {
        return new SectionResource($createSectionService->handler($request->user(), $request->content));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param CreateSectionRequest $request
     * @param Section $section
     * @param UpdateSectionService $updateSectionService
     * @return SectionResource
     */
    public function update(CreateSectionRequest $request, Section $section, UpdateSectionService $updateSectionService)
    {
        return new SectionResource($updateSectionService->handle($section, $request->content));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
