<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\JsonResponse;

class PartnerController extends Controller
{
    /**
     * Display a listing of all industry partners (DUDI).
     */
    public function index(): JsonResponse
    {
        $partners = Partner::with('departments:id,name,slug')
            ->orderBy('featured', 'desc')
            ->orderBy('name')
            ->get()
            ->map(fn ($partner) => $this->formatPartner($partner));

        return response()->json([
            'success' => true,
            'data' => $partners,
        ]);
    }

    /**
     * Display the specified partner by id.
     */
    public function show(string $id): JsonResponse
    {
        $partner = Partner::with('departments')->find($id);

        if (! $partner) {
            return response()->json([
                'success' => false,
                'message' => 'Partner not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatPartner($partner),
        ]);
    }

    private function formatPartner(Partner $partner): array
    {
        return [
            'id' => $partner->id,
            'name' => $partner->name,
            'logo' => $partner->logo,
            'industry' => $partner->industry,
            'description' => $partner->description,
            'website' => $partner->website,
            'collaborationType' => $partner->collaboration_type,
            'featured' => $partner->featured,
        ];
    }
}
