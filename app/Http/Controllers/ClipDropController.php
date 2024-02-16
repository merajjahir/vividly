<?php

namespace App\Http\Controllers;

use App\Services\ClipDropService;
use Illuminate\Http\Request;

class ClipDropController extends Controller
{
    private $clipDropService;

    public function __construct(ClipDropService $clipDropService)
    {
        $this->clipDropService = $clipDropService;
    }

    public function removeBackground(Request $request)
    {
        $imageUrl = $request->input('image_url');
        $result = $this->clipDropService->removeBackground($imageUrl);

        // Handle the result
        // ...

        return response()->json($result);
    }

    public function cleanupProcess()
    {
      

    }

}
