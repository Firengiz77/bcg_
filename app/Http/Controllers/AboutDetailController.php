<?php
namespace App\Http\Controllers;


use App\Http\Requests\AboutDetail\StoreAboutDetailRequest;
use App\Http\Requests\AboutDetail\UpdateAboutDetailRequest;
use App\Models\AboutDetail;
use App\Repositories\AboutDetailRepository;

class AboutDetailController extends Controller
{


    private AboutDetailRepository $aboutdetailRepository;

    public function __construct(AboutDetailRepository $aboutdetailRepository)
    {
        $this->aboutdetailRepository = $aboutdetailRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $aboutdetails    = AboutDetail::all();

        return view('aboutdetail.index', compact('aboutdetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('aboutdetail.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutDetailRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->aboutdetailRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('AboutDetail  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutDetail $aboutdetail)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $aboutdetail = AboutDetail::findorFail($id);
        return view('aboutdetail.edit', compact('aboutdetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutDetailRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $aboutdetail=AboutDetail::findorFail($id);
        if($request->validated())
        {
             $result =  $this->aboutdetailRepository->update($request, $aboutdetail);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('AboutDetail Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $aboutdetail = AboutDetail::findorFail($id);
        $result =  $this->aboutdetailRepository->destroy($aboutdetail);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('AboutDetail Successfully Delete!') );
    }

}
