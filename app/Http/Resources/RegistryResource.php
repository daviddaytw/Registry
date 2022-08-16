<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *  schema="Registry",
 *  title="Registry schema.",
 * )
 */
class RegistryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @OA\Property(property="id",type="string", example="8a5f733c-e11f-4ff7-836e-e418c7db00ec")
     * @OA\Property(property="data",type="data", example="some cool texts.")
     * @OA\Property(property="team_id",type="integer", example="1")
     * @OA\Property(property="created_at",type="string", example="2022-08-16T12:00:34.000000Z")
     * @OA\Property(property="updated_at",type="string", example="2022-08-16T12:00:34.000000Z")
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
