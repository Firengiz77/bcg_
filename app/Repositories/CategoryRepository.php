<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class CategoryRepository
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

            $category = new Category();


            $category->setTranslation('name', $request->lang??'az', $request->name);  
       

            $category->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $category];
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
     * @param Category $category
     * @return array
     */
    public function update($request, Category $category): array
    {
        DB::beginTransaction();

        try {

            $category->setTranslation('name', $request->lang, $request->name);  

            $category->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $category];


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



    public function destroy(Category $category): array
    {
        DB::beginTransaction();

        try {
            




            $category->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $category];


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
