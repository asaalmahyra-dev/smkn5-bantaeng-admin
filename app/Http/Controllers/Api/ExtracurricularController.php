<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\JsonResponse;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of all extracurriculars (ekstrakurikuler).
     */
    public function index(): JsonResponse
    {
        $extracurriculars = Extracurricular::with('teacher:id,name')
            ->orderBy('featured', 'desc')
            ->orderBy('name')
            ->get()
            ->map(fn ($item) => $this->formatExtracurricular($item));

        return response()->json([
            'success' => true,
            'data' => $extracurriculars,
        ]);
    }

    /**
     * Display the specified extracurricular by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $extracurricular = Extracurricular::with('teacher:id,name')->where('slug', $slug)->first();

        if (! $extracurricular) {
            return response()->json([
                'success' => false,
                'message' => 'Extracurricular not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatExtracurricular($extracurricular),
        ]);
    }

private function formatExtracurricular(Extracurricular $extracurricular): array
    {
        return [
            'id' => $extracurricular->id,
            'slug' => $extracurricular->slug,
            'name' => $extracurricular->name,
            'shortName' => $extracurricular->short_name,
            'shortDescription' => $extracurricular->short_description,
            'description' => $extracurricular->description,
            'category' => $extracurricular->category,
            'coach' => $extracurricular->teacher?->name,
            'schedule' => $extracurricular->schedule,
            'location' => $extracurricular->location,
            'icon' => $extracurricular->icon,
            'image' => $extracurricular->image,
            'imageAlt' => $extracurricular->image_alt,
            'color' => $extracurricular->color,
            'featured' => $extracurricular->featured,
            'highlights' => $extracurricular->highlights ?? [],
            'createdAt' => $extracurricular->created_at?->toIso8601String(),
            'updatedAt' => $extracurricular->updated_at?->toIso8601String(),
        ];
    }
}
