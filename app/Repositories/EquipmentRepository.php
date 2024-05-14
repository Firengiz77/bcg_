<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use App\Models\EquipmentImage;
use Throwable;

class EquipmentRepository
{

    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;

    }



    public function store($request): array
    {
        DB::beginTransaction();

        try {

            $equipment = new Equipment();


            $equipment->setTranslation('name', $request->lang??'az', $request->name);          $equipment->code = $request->code;
            $equipment->setTranslation('desc', $request->lang??'az', $request->desc);            $equipment->setTranslation('slug', $request->lang??'az', $request->slug);            $equipment->setTranslation('title', $request->lang??'az', $request->title);

            $equipment->save();

            
            if ($request->hasFile('images')) {
               
                foreach ($request->file('images') as $image) {

                    $settings = Utility::getStorageSetting();
                    if ($settings['storage_setting'] == 'local') {
                        $dir = 'uploads/' . strtolower('EquipmentImage') . '/';

                    } else {
                        $dir = 'uploads/' . strtolower('EquipmentImage') . '/';
                    }

                    $path = $image->store(strtolower('EquipmentImage'), ['disk' => 'uploads']);
                 
                    $equipmentimage = new EquipmentImage();
                    $equipmentimage->image = 'uploads/' . $path;
                    $equipmentimage->equipment_id = $equipment->id;
                    $equipmentimage->save();
                }

            }




            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $equipment];
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }


    /**
     * @param $request
     * @param Equipment $equipment
     * @return array
     */
    public function update($request, Equipment $equipment): array
    {
        DB::beginTransaction();

        try {

            $equipment->setTranslation('name', $request->lang, $request->name);          $equipment->code = $request->code;
            $equipment->setTranslation('desc', $request->lang, $request->desc);            $equipment->setTranslation('slug', $request->lang, $request->slug);            $equipment->setTranslation('title', $request->lang, $request->title);
            $equipment->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $equipment];


        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }



    public function destroy(Equipment $equipment): array
    {
        DB::beginTransaction();

        try {
            




            $equipment->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $equipment];


        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }



}
