<?php

namespace App\Http\Requests;

class AuctionAdsRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function wantsJson()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'string',
            'need_tow_truck' => 'boolean',
            'location' => 'string',
            'car_model' => 'string',
            'days_term' => 'string',
            'money_budget' => 'string',
            'author_id' => 'integer|required|exists:users,id',
        ];
    }
}
