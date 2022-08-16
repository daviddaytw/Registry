<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="v1.0",
 *      title="Registry API",
 *      description="API of Registry provided in Swagger UI.",
 *      @OA\Contact(
 *          email="dj6082013@gmail.com"
 *      ),
 *     @OA\License(
 *         name="GNU General Public License 3.0",
 *         url="https://www.gnu.org/licenses/gpl-3.0.html"
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
}
