<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\JsonResponse;

class FacilityController extends Controller
{
    /**
     * Display a listing of all facilities (fasilitas sekolah).
     */
    public function index(): JsonResponse
    {
        $facilities = Facility::with('departments:id,name,slug')
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->map(fn ($facility) => $this->formatFacility($facility));

        return response()->json([
            'success' => true,
            'data' => $facilities,
        ]);
    }

    /**
     * Display the specified facility by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $facility = Facility::with('departments')
            ->where('slug', $slug)
            ->first();

        if (! $facility) {
            return response()->json([
                'success' => false,
                'message' => 'Facility not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatFacility($facility),
        ]);
    }

    private function formatFacility(Facility $facility): array
    {
        return [
            'id' => $facility->id,
            'slug' => $facility->slug,
            'name' => $facility->name,
            'description' => $facility->description,
            'category' => $facility->category,
            'location' => $facility->location,
            'image' => $facility->image,
            'featured' => $facility->featured,
        ];
    }
}
