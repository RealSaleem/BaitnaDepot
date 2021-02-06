<?php

namespace App\Http\Requests\Admin\Advertisements;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;

class CreateAdvertisement extends FormRequest
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
            'title_en'   => ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $advertisement                   = new Advertisement();
        $advertisement->title_en         = $params['title_en'];
        $advertisement->title_ar         = $params['title_ar'] ?? $params['title_en'];
        $advertisement->sort             = $params['sort'];

        if($this->hasFile('image'))
        {
            $image_path = $this->file('image')->store('uploads/images');
            // $image_path = env('IMAGE_BASE_URL').$image_path;
            $advertisement->image = $image_path;
        }

        $advertisement->save();

        return $advertisement;
    }
}
