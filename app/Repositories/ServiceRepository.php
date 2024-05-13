<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

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
                          $service->category_id = $request->category_id;
            $service->setTranslation('slug', $request->lang??'az', $request->slug);





            $service->save();



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

            $service->setTranslation('name', $request->lang, $request->name);            $service->setTranslation('desc', $request->lang, $request->desc);
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
                          $service->category_id = $request->category_id;
            $service->setTranslation('slug', $request->lang, $request->slug);
            $service->update();

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
