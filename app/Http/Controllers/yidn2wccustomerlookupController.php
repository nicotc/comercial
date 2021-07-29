<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createyidn2wccustomerlookupRequest;
use App\Http\Requests\Updateyidn2wccustomerlookupRequest;
use App\Models\yidn2orderstats;
use App\Repositories\yidn2wccustomerlookupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class yidn2wccustomerlookupController extends AppBaseController
{
    /** @var  yidn2wccustomerlookupRepository */
    private $yidn2wccustomerlookupRepository;

    public function __construct(yidn2wccustomerlookupRepository $yidn2wccustomerlookupRepo)
    {
        $this->yidn2wccustomerlookupRepository = $yidn2wccustomerlookupRepo;
    }

    /**
     * Display a listing of the yidn2wccustomerlookup.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $yidn2wccustomerlookups = yidn2orderstats::select(
                            'yidn2_wc_order_stats.order_id',
                            'yidn2_wc_order_stats.total_sales',
                            'yidn2_wc_order_stats.`status`',
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

                            dd($yidn2wccustomerlookups);
        /* $yidn2wccustomerlookups = $this->yidn2wccustomerlookupRepository->all(); */

        return view('yidn2wccustomerlookups.index')
            ->with('yidn2wccustomerlookups', $yidn2wccustomerlookups);
    }


    /**
     * Display the specified yidn2wccustomerlookup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $yidn2wccustomerlookup = $this->yidn2wccustomerlookupRepository->find($id);

        if (empty($yidn2wccustomerlookup)) {
            Flash::error('Yidn2Wccustomerlookup not found');

            return redirect(route('yidn2wccustomerlookups.index'));
        }

        return view('yidn2wccustomerlookups.show')->with('yidn2wccustomerlookup', $yidn2wccustomerlookup);
    }

    /**
     * Show the form for editing the specified yidn2wccustomerlookup.
     *
     * @param int $id
     *
     * @return Response
     */

}
