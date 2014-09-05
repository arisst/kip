<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}


	public function image($use, $dir, $size, $file='')
	{
		$ex = explode('x', $size);
		if($ex[0] <= 0 || $ex[0] > 2000) App::abort(404);
		if($use == 'page')
		{
			if($file!='')
			{
				$img_path = public_path().'/assets/images/'.$dir.'/'.$file;
			}
			else
			{
				$img_path = public_path().'/assets/images/noimage.jpg';
			}

		}
		else
		{
			if($file!='')
			{
				$img_path = public_path().'/assets/images/'.$file;
			}
			else
			{
				$img_path = public_path().'/assets/images/noimage.jpg';
			}
		}

		$img = Image::make($img_path);
		if(isset($ex[1]))
		{
			$img->fit(intval($ex[0]),intval($ex[1]));
		}else
		{
			$img->heighten(intval($ex[0]));
		}
		
		return $img->response();


		// Image::make($img_path.'aris.jpg')->resize(300, 300)->save($img_path.'aris-300x300.jpg');

		// Image::make($img_path.'aris.jpg')->fit(300)->save($img_path.'aris-fit-300.jpg');

		// Image::make($img_path.'aris.jpg')->heighten(100)->save($img_path.'aris-heighten-100.jpg');

		/*$img = Image::make($img_path.'1.png');
		$img->resize(300,300);
		$img->save($img_path.'1-fit-300.png');
		$img->destroy();*/

		// Image::make($img_path.'aris.jpg')->encode('jpg',15)->save($img_path.'aris-encode-15.jpg');


		/*$name = Image::make($img_path.'aris.jpg')->exif();
		dd($name);*/

	}

}
