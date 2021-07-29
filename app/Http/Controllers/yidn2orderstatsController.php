<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\yidn2orderstats;
use App\Http\Controllers\AppBaseController;
use App\Repositories\yidn2orderstatsRepository;
use App\Http\Requests\Createyidn2orderstatsRequest;
use App\Http\Requests\Updateyidn2orderstatsRequest;

class yidn2orderstatsController extends AppBaseController
{
    /** @var  yidn2orderstatsRepository */
    private $yidn2orderstatsRepository;

    public function __construct(yidn2orderstatsRepository $yidn2orderstatsRepo)
    {
        $this->yidn2orderstatsRepository = $yidn2orderstatsRepo;
    }

    /**
     * Display a listing of the yidn2orderstats.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       // $yidn2orderstats = $this->yidn2orderstatsRepository->all();
        $yidn2orderstats = yidn2orderstats::select(
            'yidn2_wc_order_stats.order_id',
            'yidn2_wc_order_stats.total_sales',
            'yidn2_wc_order_stats.status',
            'yidn2_wc_order_stats.customer_id',
            'yidn2_wc_customer_lookup.username',
            'yidn2_wc_customer_lookup.first_name',
            'yidn2_wc_customer_lookup.last_name',
            'yidn2_wc_customer_lookup.email')
            ->join('yidn2_wc_customer_lookup',
                            'yidn2_wc_order_stats.customer_id',
                            '=',
                            'yidn2_wc_customer_lookup.customer_id')
            ->get();

            //dd($yidn2orderstats);
        return view('yidn2orderstats.index')
            ->with('yidn2orderstats', $yidn2orderstats);
    }


    /**
     * Display the specified yidn2orderstats.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $yidn2orderstats = $this->yidn2orderstatsRepository->find($id);

        if (empty($yidn2orderstats)) {
            Flash::error('Yidn2Orderstats not found');

            return redirect(route('yidn2orderstats.index'));
        }

        return view('yidn2orderstats.show')->with('yidn2orderstats', $yidn2orderstats);
    }


}
