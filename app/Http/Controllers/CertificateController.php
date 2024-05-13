<?php
namespace App\Http\Controllers;


use App\Http\Requests\Certificate\StoreCertificateRequest;
use App\Http\Requests\Certificate\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Repositories\CertificateRepository;

class CertificateController extends Controller
{


    private CertificateRepository $certificateRepository;

    public function __construct(CertificateRepository $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $certificates    = Certificate::all();

        return view('certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('certificate.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->certificateRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Certificate  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $certificate = Certificate::findorFail($id);
        return view('certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $certificate=Certificate::findorFail($id);
        if($request->validated())
        {
             $result =  $this->certificateRepository->update($request, $certificate);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Certificate Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $certificate = Certificate::findorFail($id);
        $result =  $this->certificateRepository->destroy($certificate);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Certificate Successfully Delete!') );
    }

}
