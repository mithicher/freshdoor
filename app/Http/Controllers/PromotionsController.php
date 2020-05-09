<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionsController extends Controller
{
    public function promotions()
	{
		return response()->stream(function () {
			while (true) {
				if (connection_aborted()) {
					break;
                }
                
                $messages = Promotion::active()->latest()->first();

				if ($messages) {
					// echo "event: ping\n", "data: {'keys': $messages->keys(), 'labels': $messages->values()}", "\n\n";
					echo "data: {$messages}", "\n\n";
				}
				ob_end_flush();
				flush();
				sleep(5);
			}
		}, 200, [
			'Content-Type' => 'text/event-stream',
			'X-Accel-Buffering' => 'no',
			'Cache-Control' => 'no-cache',
		]);
	}
}
