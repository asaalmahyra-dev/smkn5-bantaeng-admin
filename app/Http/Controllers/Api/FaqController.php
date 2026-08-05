<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Faq::orderBy('sort_order')->orderBy('category');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $faqs = $query->get()
            ->map(fn ($item) => $this->formatFaq($item));

        return response()->json([
            'success' => true,
            'data' => $faqs,
        ]);
    }

    private function formatFaq(Faq $faq): array
    {
        return [
            'id' => $faq->id,
            'question' => $faq->question,
            'answer' => $faq->answer,
            'category' => $faq->category,
            'order' => $faq->sort_order,
        ];
    }
}
