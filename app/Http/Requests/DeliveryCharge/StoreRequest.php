<?php

namespace App\Http\Requests\DeliveryCharge;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest {

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
                'distance_type' => ['required'],
                'distance' => ['required', 'numeric'],
                'distance_charge' => ['required', 'numeric'],
                'position' => ['required', 'numeric'],
                'status' => ['required', 'numeric'],
            ];
        } else {
            if (Request::input('category') == 1) {
                return [
                    'category' => ['required'],
                    'weight' => ['required', 'numeric', 'unique:delivery_charges,weight'],
                    'same_day' => ['required', 'numeric',],
                    'next_day' => ['required', 'numeric',],
                    'sub_city' => ['required', 'numeric',],
                    'outside_city' => ['required', 'numeric',],
                    'position' => ['required', 'numeric',],
                    'status' => ['required', 'numeric',],
                ];
            } else {
                return [
                    'category' => ['required', 'numeric'],
                    'same_day' => ['required', 'numeric',],
                    'next_day' => ['required', 'numeric',],
                    'sub_city' => ['required', 'numeric',],
                    'outside_city' => ['required', 'numeric',],
                    'position' => ['required', 'numeric',],
                    'status' => ['required', 'numeric',],
                ];
            }
        }
    }
}
