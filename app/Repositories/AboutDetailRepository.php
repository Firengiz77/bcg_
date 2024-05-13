<?php

namespace App\Repositories;

use App\Models\AboutDetail;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class AboutDetailRepository
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

            $aboutdetail = new AboutDetail();



                $image = $this->imageRepository->upload($request, "AboutDetail", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $aboutdetail->image = $image["data"];
                }
                            $aboutdetail->setTranslation('title', $request->lang??'az', $request->title);            $aboutdetail->setTranslation('desc', $request->lang??'az', $request->desc);





            $aboutdetail->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $aboutdetail];
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
     * @param AboutDetail $aboutdetail
     * @return array
     */
    public function update($request, AboutDetail $aboutdetail): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "AboutDetail", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($aboutdetail->image);
                    $aboutdetail->image = $image["data"];
                }
                            $aboutdetail->setTranslation('title', $request->lang, $request->title);            $aboutdetail->setTranslation('desc', $request->lang, $request->desc);
            $aboutdetail->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $aboutdetail];


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



    public function destroy(AboutDetail $aboutdetail): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($aboutdetail->image);
                




            $aboutdetail->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $aboutdetail];


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
