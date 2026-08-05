<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles (berita).
     */
    public function index(Request $request): JsonResponse
    {
        $query = News::with('category')
            ->where('status', 'published');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->boolean('featured')) {
            $query->where('featured', true);
        }

        $news = $query->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($request->integer('per_page', 12));

        $data = collect($news->items())->map(fn ($item) => $this->formatNews($item));

        return response()->json([
            'success' => true,
            'data' => $data,
            'meta' => [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
                'per_page' => $news->perPage(),
                'total' => $news->total(),
            ],
        ]);
    }

    /**
     * Display the specified news article by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $news = News::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (! $news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatNews($news, true),
        ]);
    }

    private function formatNews(News $news, bool $detail = false): array
    {
        $data = [
            'id' => $news->id,
            'slug' => $news->slug,
            'title' => $news->title,
            'excerpt' => $news->excerpt,
            'coverImage' => $news->cover_image,
            'category' => $news->category?->name,
            'author' => $news->author,
            'publishedAt' => $news->published_at?->toIso8601String(),
            'featured' => $news->featured,
            'tags' => $news->tags ?? [],
        ];

        if ($detail) {
            $data['content'] = $news->content;
        }

        return $data;
    }
}
