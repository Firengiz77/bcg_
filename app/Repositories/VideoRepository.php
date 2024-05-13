<?php

namespace App\Repositories;

use App\Models\Video;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class VideoRepository
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

            $video = new Video();



                $image = $this->imageRepository->upload($request, "Video", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $video->image = $image["data"];
                }
                          $video->link = $request->link;






            $video->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $video];
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
     * @param Video $video
     * @return array
     */
    public function update($request, Video $video): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "Video", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($video->image);
                    $video->image = $image["data"];
                }
                          $video->link = $request->link;

            $video->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $video];


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



    public function destroy(Video $video): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($video->image);
                




            $video->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $video];


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
