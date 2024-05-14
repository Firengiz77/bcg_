<?php

namespace App\Repositories;

use App\Models\EquipmentImage;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class EquipmentImageRepository
{

    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;

    }



    public function store($id,$request): array
    {
        DB::beginTransaction();

        try {

            $equipmentimage = new EquipmentImage();


          $equipmentimage->image = $request->image;
          $equipmentimage->equipment_id = $id;

            $equipmentimage->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $equipmentimage];
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
     * @param EquipmentImage $equipmentimage
     * @return array
     */
    public function update($request, EquipmentImage $equipmentimage): array
    {
        DB::beginTransaction();

        try {

          $equipmentimage->image = $request->image;
          $equipmentimage->equipment_id = $request->equipment_id;

            $equipmentimage->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $equipmentimage];


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



    public function destroy(EquipmentImage $equipmentimage): array
    {
        DB::beginTransaction();

        try {
            




            $equipmentimage->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $equipmentimage];


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
