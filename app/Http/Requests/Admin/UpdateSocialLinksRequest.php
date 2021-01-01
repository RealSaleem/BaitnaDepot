<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\WebSocialLink;
use Auth;

class UpdateSocialLinksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            // 'facebook'      => 'required',
            // 'twitter'       => 'required',
            // 'instagram'     => 'required',
            // 'snapchat'      => 'required'
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $vendor_id = null;

        if(Auth::check()){
            $vendor_id    = Auth::user()->vendor->id;
            $social_media = WebSocialLink::where('vendor_id', $vendor_id)->first();
        } else {
            $social_media = WebSocialLink::whereNull('vendor_id')->first();
        }

        if($social_media === null)
        {
            $social_media = new WebSocialLink;
        }
        
        $social_media->facebook     = $params['facebook'];
        $social_media->twitter      = $params['twitter'];
        $social_media->instagram    = $params['instagram'];
        $social_media->snapchat     = $params['snapchat'];
        $social_media->vendor_id    = $vendor_id;
        $social_media->save();

        return $social_media;
    }
}
