<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegistryResource;
use App\Models\Registry;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * Show the registry.
     *
     * @OA\Get(
     *     path="/registry/{registryId}",
     *     summary="Retrieve the registry.",
     *     tags={"Registry"},
     *     @OA\Parameter (
     *          name = "registryId",
     *          in = "path",
     *          description = "The identifier of the registry.",
     *          required = true,
     *          schema = {
     *              "type" = "string",
     *          },
     *     ),
     *     @OA\Parameter (
     *          name = "Authorization",
     *          in = "header",
     *          description = "Enter token in format (Bearer (token))",
     *          schema = {
     *              "type" = "string",
     *          },
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Registry")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     *
     * @param  Request  $request
     * @param  Registry  $registry
     * @return type
     */
    public function show(Request $request, Registry $registry)
    {
        if ($registry->access_token && $request->bearerToken() != $registry->access_token) {
            return response('Access denied', 403);
        }

        return new RegistryResource($registry);
    }

    /**
     * Update the registry.
     *
     * @OA\Put(
     *     path="/registry/{registryId}",
     *     summary="Retrieve the registry.",
     *     tags={"Registry"},
     *     @OA\Parameter (
     *          name = "registryId",
     *          in = "path",
     *          description = "The identifier of the registry.",
     *          required = true,
     *          schema = {
     *              "type" = "string",
     *          },
     *     ),
     *     @OA\Parameter (
     *          name = "Authorization",
     *          in = "header",
     *          description = "Enter token in format (Bearer (token))",
     *          schema = {
     *              "type" = "string",
     *          },
     *     ),
     *     @OA\RequestBody(
     *         description="Object's data to store.",
     *         required=true,
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property = "data",
     *                      description = "The data to update the registry.",
     *                      type = "string",
     *                  )
     *              ),
     *          ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     *
     * @param  Request  $request
     * @param  Registry  $registry
     * @return type
     */
    public function update(Request $request, Registry $registry)
    {
        $request->validate([
            'data' => 'required',
        ]);
        if ($registry->write_token && $request->bearerToken() != $registry->write_token) {
            return response('Access denied', 403);
        }

        $registry->update([
            'data' => $request->data,
        ]);

        return response('Success', 200);
    }
}
