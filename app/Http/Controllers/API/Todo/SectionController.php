<?php

namespace App\Http\Controllers\API\Todo;

use App\Actions\Todo\CreateSectionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Todo\CreateSectionRequest;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
