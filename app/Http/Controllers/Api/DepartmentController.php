<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of all departments (program keahlian).
     */
    public function index(): JsonResponse
    {
        $departments = Department::with([
            'teachers:id,name,position,photo,department_id',
            'facilities:id,name,slug,category',
            'partners:id,name,industry',
        ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn ($dept) => $this->formatDepartment($dept));

        return response()->json([
            'success' => true,
            'data' => $departments,
        ]);
    }

    /**
     * Display the specified department by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $department = Department::with([
            'teachers:id,name,position,photo,department_id',
            'facilities:id,name,slug,category,description,location,image',
            'partners:id,name,logo,industry,description',
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (! $department) {
            return response()->json([
                'success' => false,
                'message' => 'Department not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatDepartment($department, true),
        ]);
    }

    private function formatDepartment(Department $dept, bool $detail = false): array
    {
        $data = [
            'id' => $dept->id,
            'slug' => $dept->slug,
            'name' => $dept->name,
            'shortName' => $dept->short_name,
            'category' => $dept->category,
            'headline' => $dept->headline,
            'description' => $dept->description,
            'vision' => $dept->vision,
            'mission' => $dept->mission ?? [],
            'competencies' => $dept->competencies ?? [],
            'careerPaths' => $dept->career_paths ?? [],
            'coverImage' => $dept->cover_image,
            'gallery' => $dept->gallery ?? [],
            'featured' => $dept->featured,
            'teachers' => $dept->teachers->pluck('id'),
            'facilities' => $dept->facilities->pluck('id'),
            'industryPartners' => $dept->partners->pluck('id'),
        ];

        if ($detail) {
            $data['teacherDetails'] = $dept->teachers;
            $data['facilityDetails'] = $dept->facilities->map(fn ($f) => [
                'id' => $f->id,
                'name' => $f->name,
                'slug' => $f->slug,
                'category' => $f->category,
                'description' => $f->description,
                'location' => $f->location,
                'image' => $f->image,
            ]);
            $data['partnerDetails'] = $dept->partners;
        }

        return $data;
    }
}
