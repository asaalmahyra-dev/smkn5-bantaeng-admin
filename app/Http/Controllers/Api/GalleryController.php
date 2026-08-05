<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of gallery items.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Gallery::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $items = $query->orderBy('featured', 'desc')
            ->orderBy('taken_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($item) => $this->formatGallery($item));

        return response()->json([
            'success' => true,
            'data' => $items,
        ]);
    }

    /**
     * Display the specified gallery item by id.
     */
    public function show(string $id): JsonResponse
    {
        $item = Gallery::find($id);

        if (! $item) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery item not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatGallery($item),
        ]);
    }

    private function formatGallery(Gallery $gallery): array
    {
        return [
            'id' => $gallery->id,
            'title' => $gallery->title,
            'category' => $gallery->category,
            'image' => $gallery->image,
            'description' => $gallery->description,
            'takenAt' => $gallery->taken_at?->toIso8601String(),
            'featured' => $gallery->featured,
        ];
    }
}
