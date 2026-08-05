<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;

class TeacherController extends Controller
{
    /**
     * Display a listing of all teachers (guru & staff).
     */
    public function index(): JsonResponse
    {
        $teachers = Teacher::with('department:id,name,slug,short_name')
            ->orderBy('position')
            ->orderBy('name')
            ->get()
            ->map(fn ($teacher) => $this->formatTeacher($teacher));

        return response()->json([
            'success' => true,
            'data' => $teachers,
        ]);
    }

    /**
     * Display the specified teacher by id.
     */
    public function show(string $id): JsonResponse
    {
        $teacher = Teacher::with('department')->find($id);

        if (! $teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatTeacher($teacher),
        ]);
    }

    private function formatTeacher(Teacher $teacher): array
    {
        return [
            'id' => $teacher->id,
            'name' => $teacher->name,
            'position' => $teacher->position,
            'departmentId' => $teacher->department_id,
            'photo' => $teacher->photo,
            'bio' => $teacher->bio,
            'email' => $teacher->email,
            'phone' => $teacher->phone,
            'education' => $teacher->education,
            'specialization' => $teacher->specialization,
        ];
    }
}
