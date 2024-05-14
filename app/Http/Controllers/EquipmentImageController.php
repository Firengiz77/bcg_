<?php
namespace App\Http\Controllers;


use App\Http\Requests\EquipmentImage\StoreEquipmentImageRequest;
use App\Http\Requests\EquipmentImage\UpdateEquipmentImageRequest;
use App\Models\EquipmentImage;
use App\Repositories\EquipmentImageRepository;

class EquipmentImageController extends Controller
{


    private EquipmentImageRepository $equipmentimageRepository;

    public function __construct(EquipmentImageRepository $equipmentimageRepository)
    {
        $this->equipmentimageRepository = $equipmentimageRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $equipmentimages    = EquipmentImage::all();

        return view('equipmentimage.index', compact('equipmentimages','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('equipmentimage.create',compact('id'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentImageRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->equipmentimageRepository->store($id,$request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('EquipmentImage  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentImage $equipmentimage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $equipmentimage = EquipmentImage::findorFail($id);
        return view('equipmentimage.edit', compact('equipmentimage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentImageRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $equipmentimage=EquipmentImage::findorFail($id);
        if($request->validated())
        {
             $result =  $this->equipmentimageRepository->update($request, $equipmentimage);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('EquipmentImage Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $equipmentimage = EquipmentImage::findorFail($id);
        $result =  $this->equipmentimageRepository->destroy($equipmentimage);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('EquipmentImage Successfully Delete!') );
    }

}
