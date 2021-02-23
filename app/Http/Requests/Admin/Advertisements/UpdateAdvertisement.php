<?php

namespace App\Http\Requests\Admin\Advertisements;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class UpdateAdvertisement extends FormRequest
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
        $params = $this->all();
        return [
            'title_en'   =>  ['required',
                              Rule::unique('advertisements', 'title_en')->ignore($params['id'])
                              ],
        ];
    }

    public function handle()
    {

        $params = $this->all();
        $id = $params['id'];

        $advertisement                   = Advertisement::find($id);
        $advertisement->title_en         = $params['title_en'];
        $advertisement->title_ar         = $params['title_ar'] ?? $params['title_en'];
        $advertisement->sort             = $params['sort'];

        if($this->hasFile('image') && isset($params['image']))
        {
            \App\Helpers\Helper::deleteAttachment($advertisement->image);
            
            $image_path = $this->file('image')->store('uploads/images');
            $advertisement->image = $image_path;
        } else if($params['hidden_image'] == null){
            \App\Helpers\Helper::deleteAttachment($advertisement->image);
            $advertisement->image = null;
        }

        $advertisement->save();

        return $advertisement;
    }
}
