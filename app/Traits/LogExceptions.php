<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

trait LogExceptions
{
    public function logException(Exception $e, $routeName, $methodName)
    {
        
        DB::table('error_logs')->insert([
            'route_name' => $routeName,
            'method_name' => $methodName,
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'stack_trace' => $e->getTraceAsString(),
            'created_by' => 1,
            'updated_by' => 1
        ]);

        
    }
	
	function processImage($file, $outputPath, $width, $name)
	{
		// $imagick = new \Imagick();
		// $imagick->readImage($file->getPathname());

		// if ($imagick->getImageWidth() > $width) {
			// $imagick->resizeImage($width, 0, \Imagick::FILTER_LANCZOS, 1);
		// }

		// $image_name = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $name);

		// $imagick->setImageCompressionQuality(60);
		// $imagick->writeImage($outputPath . $image_name);

		// $imagick->clear();
		// $imagick->destroy();
		
		// return $image_name;
		
		$imagick = new \Imagick();
		$imagick->readImage($file->getPathname());

		if ($imagick->getImageWidth() > $width) {
			$imagick->resizeImage($width, 0, \Imagick::FILTER_LANCZOS, 1);
		}

		// Optimize image
		$imagick->stripImage(); 
		$imagick->setImageCompressionQuality(60);
		$imagick->setImageFormat('jpeg');
 
		// Further reduce size using additional compression techniques
		// $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
		// $imagick->setImageCompressionQuality(70);
  
		$image_name = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $name);

		$imagick->writeImage($outputPath . $image_name);

		$imagick->clear();
		$imagick->destroy();
		
		return $image_name;
	}
}