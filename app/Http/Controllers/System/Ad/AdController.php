<?php

namespace App\Http\Controllers\System\Ad;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\ResourceController;
use App\Services\System\AdService;
use Illuminate\Http\Request;

class AdController extends ResourceController
{
    public function __construct(AdService $adService)
    {
        parent::__construct($adService);
    }

    // public function storeValidationRequest()
    // {
    //     return 'App\Http\Requests\system\categoryRequest';
    // }

    // public function updateValidationRequest()
    // {
    //     return 'App\Http\Requests\system\categoryRequest';
    // }

    public function moduleName()
    {
        return 'ads';
    }

    public function viewFolder()
    {
        return 'system.ad';
    }
}
