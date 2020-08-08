<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
 * @SWG\Swagger(
 *   basePath="/api",
 *   @SWG\Info(
 *     title="API Movie Itla 2020",
 *     description="<h3><kbd> <b>Creado por Ana Teresa Vargas Brito</b></kbd></h3>",
 *     version="1.0.0",
 *   )
 * )
 */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}