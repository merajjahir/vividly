<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\ClipDropService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $clip_drop_services;
    public function __construct(ClipDropService $clip_drop_services)
    {
        $this->clip_drop_services = $clip_drop_services;
    }

    public function get_home()
    {
        return view('index');
    }
    public function get_background_remove()
    {
        return view('background_lp');
    }
    public function post_background_remove(Request $request)
    {
        $request->validate([
            'primary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $primary_image_fileName = time() . '.' . $request->primary_image->extension();
        $request->primary_image->storeAs('public/images', $primary_image_fileName);
 
        $newimage = new Image();
        $newimage->primary_image_path = $primary_image_fileName;
        $newimage->save();


        $form = [
            'image_file' => asset('storage/images/' . $primary_image_fileName),
        ];

        try {
            
            $processedImage = $this->clip_drop_services->removeBackground($form);

            // Saveing the processed image
            $processed_image_fileName = 'background_removed_' . $primary_image_fileName;
            file_put_contents(storage_path('app/public/images/' . $processed_image_fileName), $processedImage);

            // Update the Image model with the processed image path
            $newimage->morphed_image_path = $processed_image_fileName;
            $newimage->save();

          
            return response()->json([
                'processed_image_path' => asset('storage/images/' . $processed_image_fileName),
                'message' => 'porcessed successfully'

            ]);

        } catch (\Exception $e) {
            if($e instanceof \GuzzleHttp\Exception\ClientException){
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $errorBody = json_decode($response->getBody(), true);
        
                $errorMessage = isset($errorBody['error']) ? $errorBody['error'] : 'Unknown error';
                
                return response()->json([
                    'status' => 'error',
                    'message' => $errorMessage,
                    'client_error' => $e->getMessage()

                ], $statusCode);
            }
        }
    }

    public function get_cleanup()
    {
        return view('cleanup_lp');
    }

    public function post_cleanup(Request $request)
    {
        $request->validate([
            'primary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'masking_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $primary_image_fileName = time() . '.' . $request->primary_image->extension();
        $request->primary_image->storeAs('public/images', $primary_image_fileName);

        $masking_image_fileName = time() . '.' . $request->masking_image->extension();
        $request->masking_image->storeAs('public/images', $masking_image_fileName);
 
        $newimage = new Image();
        $newimage->primary_image_path = $primary_image_fileName;
        $newimage->masking_image_path = $masking_image_fileName;
        $newimage->save();


        $form = [
            'image_file' => asset('storage/images/' . $primary_image_fileName),
            'mask_file' => asset('storage/images/' . $masking_image_fileName)
        ];

        try {
            $processedImage = $this->clip_drop_services->cleanup($form);

            // Saveing the processed image
            $processed_image_fileName = 'processed_' . $primary_image_fileName;
            file_put_contents(storage_path('app/public/images/' . $processed_image_fileName), $processedImage);

            // Update the Image model with the processed image path
            $newimage->morphed_image_path = $processed_image_fileName;
            $newimage->save();

            return response()->json([
                'processed_image_path' => asset('storage/images/' . $processed_image_fileName),
                'message' => 'porcessed successfully'
            ]);

        } catch (\Exception $e) {
            if($e instanceof \GuzzleHttp\Exception\ClientException){
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $errorBody = json_decode($response->getBody(), true);
        
                $errorMessage = isset($errorBody['error']) ? $errorBody['error'] : 'Unknown error';
                
                return response()->json([
                    'status' => 'error',
                    'message' => $errorMessage,
                    'client_error' => $e->getMessage()

                ], $statusCode);
            }
        }
     

    }

}
