<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of achievements (prestasi).
     */
    public function index(Request $request): JsonResponse
    {
        $query = Achievement::query();

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('year')) {
            $query->where('year', $request->integer('year'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $achievements = $query->orderBy('year', 'desc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($item) => $this->formatAchievement($item));

        return response()->json([
            'success' => true,
            'data' => $achievements,
        ]);
    }

    /**
     * Display the specified achievement by id.
     */
    public function show(string $id): JsonResponse
    {
        $achievement = Achievement::find($id);

        if (! $achievement) {
            return response()->json([
                'success' => false,
                'message' => 'Achievement not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatAchievement($achievement),
        ]);
    }

    private function formatAchievement(Achievement $achievement): array
    {
        return [
            'id' => $achievement->id,
            'title' => $achievement->title,
            'category' => $achievement->category,
            'description' => $achievement->description,
            'year' => $achievement->year,
            'image' => $achievement->image,
            'participants' => $achievement->participants ?? [],
            'level' => $achievement->level,
        ];
    }
}
