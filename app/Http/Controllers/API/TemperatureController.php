<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\SetTemperatureRequest;
use App\Http\Controllers\Controller;
use App\Models\HsmsTools;

class TemperatureController extends Controller
{
    /**
     * This api use for store temperature record
     *
     * @param SetTemperatureRequest $request
     * @return Json
     */
    public function setTemperature(SetTemperatureRequest $request)
    {
        $temperature = HsmsTools::where('macId', $request->macId)->update(['temperature' => $request->temperature, 'lastUseDateTime' => now()]);
        if ($temperature) {
            return $this->toJson([], trans('api.temperature.success'), 1);
        }
        return $this->toJson([], trans('api.temperature.error'), 0);
    }

}
