<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\FoodOrderRequest;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Services\ResponseBuilderService\ResponseApiClient;

class FoodController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $response;

    public function __construct()
    {
        $this->response = app(ResponseApiClient::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::query()->whereDoesntHave('ingredients', function ($query) {
            $query->where(function ($q){
                $q->where('stock', 0)->orWhere('expires_at', '<', now());
            });
        })->get();

        $this->response->setResult(new FoodResource($foods));
        $this->response->setStatus(true);

        return $this->response->build();
    }

    /**
     * @param FoodOrderRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function order(FoodOrderRequest $request)
    {
        /** @var Food $food */
        $food = Food::query()->find($request->get('food'));

        //make an order and decrement stocks
        $food->ingredients()->decrement('stock');

        $this->response->setResult([]);
        $this->response->setStatus(true);

        return $this->response->build();
    }
}
