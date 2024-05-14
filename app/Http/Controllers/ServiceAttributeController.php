<?php
namespace App\Http\Controllers;


use App\Http\Requests\ServiceAttribute\StoreServiceAttributeRequest;
use App\Http\Requests\ServiceAttribute\UpdateServiceAttributeRequest;
use App\Models\ServiceAttribute;
use App\Repositories\ServiceAttributeRepository;

class ServiceAttributeController extends Controller
{


    private ServiceAttributeRepository $serviceattributeRepository;

    public function __construct(ServiceAttributeRepository $serviceattributeRepository)
    {
        $this->serviceattributeRepository = $serviceattributeRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $serviceattributes    = ServiceAttribute::all();

        return view('serviceattribute.index', compact('serviceattributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('serviceattribute.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceAttributeRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->serviceattributeRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ServiceAttribute  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceAttribute $serviceattribute)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $serviceattribute = ServiceAttribute::findorFail($id);
        return view('serviceattribute.edit', compact('serviceattribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceAttributeRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $serviceattribute=ServiceAttribute::findorFail($id);
        if($request->validated())
        {
             $result =  $this->serviceattributeRepository->update($request, $serviceattribute);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ServiceAttribute Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $serviceattribute = ServiceAttribute::findorFail($id);
        $result =  $this->serviceattributeRepository->destroy($serviceattribute);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ServiceAttribute Successfully Delete!') );
    }

}
