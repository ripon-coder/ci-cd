<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\HomeService;
use App\Models\User;
use App\Enum\Status;
use App\Services\PaymentGateway;
class HomeController extends Controller
{
    
    public function index(HomeService $homeService){
        return $homeService->name = "John Doe";
    }
}
