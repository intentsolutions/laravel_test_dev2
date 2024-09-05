<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Jobs\ProcessSubmission;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SubmissionController extends Controller
{
    public function submit(SubmissionRequest $request): JsonResponse
    {
        try {
            ProcessSubmission::dispatch($request->validated());

            return response()->json(['message' => 'Submission received and is being processed.'],
                ResponseAlias::HTTP_ACCEPTED);
        } catch (Exception $exception) {
            return response()->json(['message' => 'Submission received error.'],
                ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
