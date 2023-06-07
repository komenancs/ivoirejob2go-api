<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser{

    protected function getSuccessResponse($data, $code = 200, $message = null, $version ='v1.0.1')
	{
		return response()->json([
			'status'=> $code, 
			'version' => $version,
			'message' => $message, 
			'data' => $data
		], $code);
	}

	protected function getErrorResponse($code, $message = null, $version ='v1.0.1')
	{
		return response()->json([
			'status'=> $code,
			'version' => $version,
			'message' => $message,
			'data' => null
		], $code);
	}

	protected function getResponseTemplate($code, $message = 'OK', $version ='v1.0.1')
	{
		return [
			'status'=> $code,
			'version' => $version,
			'message' => $message,
		];
	}

}