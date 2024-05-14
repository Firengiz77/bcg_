<?php

namespace App\Repositories;

use App\Models\ServiceAttribute;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ServiceAttributeRepository
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

            $serviceattribute = new ServiceAttribute();


            $serviceattribute->setTranslation('key', $request->lang??'az', $request->key); 
                       $serviceattribute->setTranslation('value', $request->lang??'az', $request->value);   
                   $serviceattribute->service_id = $request->service_id;

                $image = $this->imageRepository->upload($request, "ServiceAttribute", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $serviceattribute->image = $image["data"];
                }
                





            $serviceattribute->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $serviceattribute];
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
     * @param ServiceAttribute $serviceattribute
     * @return array
     */
    public function update($request, ServiceAttribute $serviceattribute): array
    {
        DB::beginTransaction();

        try {

            $serviceattribute->setTranslation('key', $request->lang, $request->key);        
            $serviceattribute->setTranslation('value', $request->lang, $request->value);   
            $serviceattribute->service_id = $request->service_id;

                $image = $this->imageRepository->upload($request, "ServiceAttribute", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($serviceattribute->image);
                    $serviceattribute->image = $image["data"];
                }
                
            $serviceattribute->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $serviceattribute];


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



    public function destroy(ServiceAttribute $serviceattribute): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($serviceattribute->image);
                




            $serviceattribute->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $serviceattribute];


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
