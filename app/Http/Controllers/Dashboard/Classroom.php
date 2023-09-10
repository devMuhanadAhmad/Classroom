<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom as ModelsClassroom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Classroom extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = ModelsClassroom::orderBy('created_at', 'DESC')->simplePaginate(6);
        return view('classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classroom = new ModelsClassroom();
        return view('classroom.create', compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'section' => 'nullable|string',
            'subject' => 'nullable|string',
            'room' => 'nullable|string',
            'cover_image_path' => 'required|image',
        ]);

        DB::beginTransaction();
        try {

            $request->merge([
                'code' => Str::random(10),
                'user_id' => 4,
            ]);


            $data = $request->except('cover_image_path');
            // Check img
            if (!$request->file('cover_image_path')->isValid()) {
                //flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            } else {
                $photo = $request->file('cover_image_path');
                //name this is classroom name
                $name = Str::slug($request->input('name'));
                $filename = $name . '.' . $photo->getClientOriginalExtension();
                $data['cover_image_path'] = $request->file('cover_image_path')->storeAs('classroom', $filename, 'upload_image');
            }
            ModelsClassroom::create($data);
            DB::commit();
            return redirect()->route('classroom.index')->with('success', __("Operation accomplished successfully"));

        }
        catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', "Add failed ");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsClassroom $classroom)
    {
        return view('classroom.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsClassroom $classroom)
    {
        return view('classroom.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsClassroom $classroom)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'section' => 'nullable|string',
            'subject' => 'nullable|string',
            'room' => 'nullable|string',
            'cover_image_path' => 'image',
        ]);

        DB::beginTransaction();
        try {
            $old_image = $classroom->image;
            $data = $request->except('cover_image_path');
            // Check img
            if ($request->hasFile('cover_image_path')) {
                $photo = $request->file('cover_image_path');
                //name this is classroom name
                $name = Str::slug($request->input('name'));
                $filename = $name . '.' . $photo->getClientOriginalExtension();
                $data['cover_image_path'] = $request->file('cover_image_path')->storeAs('classroom', $filename, 'upload_image');
            }
            if ($old_image && isset($data['cover_image_path'])) {
                Storage::disk('upload_image')->delete($old_image);
            }
            $classroom->update($data);
            DB::commit();
            return redirect()->route('classroom.index')->with('success', __("Operation accomplished successfully"));

        }
        catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', "Add failed ");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsClassroom $classroom)
    {

        Storage::disk('upload_image')->delete($classroom->cover_image_path);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success', __("Operation accomplished successfully"));

    }
}
