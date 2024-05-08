<?php

namespace App\Http\Requests\MerchantDeliveryCharge;

use App\Enums\Status;
use App\Models\Backend\MerchantDeliveryCharge;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MerchantDeliveryChargeRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if (Request::input('delivery_type') == 1) {
            return [
                'delivery_charge_id' => ['required', 'numeric'],
                'delivery_type' => ['required', 'numeric'],
                'distance_type' => ['required', 'numeric'],
                'distance' => ['required', 'numeric'],
                'distance_charge' => ['required', 'numeric'],
                'status' => ['required', 'numeric'],
            ];
        }else{
            return [
                'delivery_charge_id' => ['required', 'numeric'],
                'same_day' => ['required', 'numeric'],
                'next_day' => ['required', 'numeric'],
                'sub_city' => ['required', 'numeric'],
                'outside_city' => ['required', 'numeric'],
                'delivery_type' => ['required', 'numeric'],
                'status' => ['required', 'numeric'],
            ];
        }
    }

    public function attributes() {
        if (Request::input('delivery_type') == 1) {
            return [
                'delivery_charge_id' => trans('validation.attributes.delivery_category'),
                'status' => trans('validation.attributes.status'),
                'delivery_type' => trans('validation.attributes.delivery_type'),
                'distance_type' => trans('validation.attributes.distance_type'),
                'distance' => trans('validation.attributes.distance'),
                'distance_charge' => trans('validation.attributes.distance_charge'),
            ];
        }else{
            return [
                'delivery_charge_id' => trans('validation.attributes.delivery_category'),
                'status' => trans('validation.attributes.status'),
                'same_day' => trans('validation.attributes.same_day'),
                'next_day' => trans('validation.attributes.next_day'),
                'sub_city' => trans('validation.attributes.sub_city'),
                'outside_city' => trans('validation.attributes.outside_city'),
                'delivery_type' => trans('validation.attributes.delivery_type'),
            ];
        }
    }

    public function withValidator($validator) {

        $validator->after(function ($validator) {
            if ($this->userUniqueCheck()) {
                $validator->errors()->add('delivery_charge_id', trans('validation.attributes.delivery_category'));
            }
        });
    }

    private function userUniqueCheck() {
        $id = $this->id;
        $queryArray['delivery_charge_id'] = request('delivery_charge_id');
        $queryArray['merchant_id'] = $this->merchant;
        $hubInCharge = MerchantDeliveryCharge::where($queryArray)->where('id', '!=', $id)->first();

        if (blank($hubInCharge)) {
            return false;
        }
        return true;
    }

}
