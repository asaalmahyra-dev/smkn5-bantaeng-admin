<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    /**
     * Display a listing of all testimonials.
     */
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($item) => $this->formatTestimonial($item));

        return response()->json([
            'success' => true,
            'data' => $testimonials,
        ]);
    }

    private function formatTestimonial(Testimonial $testimonial): array
    {
        return [
            'id' => $testimonial->id,
            'name' => $testimonial->name,
            'photo' => $testimonial->photo,
            'role' => $testimonial->role,
            'message' => $testimonial->message,
            'rating' => $testimonial->rating,
        ];
    }
}
