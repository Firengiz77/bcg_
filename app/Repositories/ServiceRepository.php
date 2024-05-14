<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use App\Models\ServiceAttribute;
use Throwable;

class ServiceRepository
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

            $service = new Service();

            $service->setTranslation('name', $request->lang??'az', $request->name);   
            $service->setTranslation('desc', $request->lang??'az', $request->desc);

                $image = $this->imageRepository->upload($request, "Service", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $service->image = $image["data"];
                }
                         
            $service->save();
      
            if (is_array($request->fields)) {
        
                foreach ($request->fields as $key => $value) {
                
                    $attribute = new ServiceAttribute();

                 if (isset($value['image'])) {
                    $imageUploadResult = $this->imageRepository->uploadAttribute($value, "ServiceAttribute", "image");

                    if (!$imageUploadResult["status"]) {
                        return [
                            "status" => false,
                            "code" => 502,
                            "message" => __("Image Attribute Error.")
                        ];
                    } elseif ($imageUploadResult["code"] == 200) {
                        $attribute->image = $imageUploadResult["data"];
                    }
                }

                    $attribute->setTranslation("key",  $request->lang ?? 'az', $value['key']);
                    $attribute->setTranslation("value",  $request->lang ?? 'az', $value['value']);
                    $attribute->service_id  = $service->id;

                    $attribute->save();
                }
            }




            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $service];
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
     * @param Service $service
     * @return array
     */
    public function update($request, Service $service): array
    {
        DB::beginTransaction();

        try {

            $service->setTranslation('name', $request->lang, $request->name);       
            $service->setTranslation('desc', $request->lang, $request->desc);
                
            $image = $this->imageRepository->upload($request, "Service", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($service->image);
                    $service->image = $image["data"];
                }
                     


            $service->update();


            if($request->attribute){
                foreach ($request->attribute as $key => $value) {
            
                    $attribute = ServiceAttribute::find($value['id']);
                   
                   
                   
                    if(array_key_exists("image",$value)){
                        $imageUploadResult = $this->imageRepository->uploadAttribute($value, "ServiceAttribute", "image");
                        if (!$imageUploadResult["status"]) {
                            return [
                                "status" => false,
                                "code" => 502,
                                "message" => __("Image Attribute 1 Error.")
                            ];
                        } elseif ($imageUploadResult["code"] == 200) {
                            Utility::deleteFile($attribute->image);
                            $attribute->image = $imageUploadResult["data"];
                        }    
                    }
                 
                  
                    $attribute->setTranslation("key",  $request->lang, $value['key']);
                    $attribute->setTranslation("value",  $request->lang, $value['value']);
                    $attribute->save();
                
                }
            }
            
            
            if($request->fields){
                foreach ($request->fields as $key => $value) {
                    $attribute = new ServiceAttribute();
                    $imageUploadResult2 = $this->imageRepository->uploadAttribute($value, "ServiceAttribute", "image");
                    if (!$imageUploadResult2["status"]) {
                        return [
                            "status" => false,
                            "code" => 502,
                            "message" => __("Image Attribute 2 Error.")
                        ];
                    } elseif ($imageUploadResult2["code"] == 200) {
                        Utility::deleteFile($attribute->image);
                        $attribute->image = $imageUploadResult2["data"];
                    }

                    $attribute->setTranslation("key", $request->lang, $value['key']);
                    $attribute->setTranslation("value",  $request->lang, $value['value']);

                    $attribute->service_id  = $service->id;
                    $attribute->save();
                }
            }

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $service];


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



    public function destroy(Service $service): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($service->image);
            
            $service->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $service];


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
