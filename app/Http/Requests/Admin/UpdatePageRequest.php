<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Page;

class UpdatePageRequest extends FormRequest
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
            'title_en'  => ['required']
        ];
    }

    public function handle(){

        $params = $this->all();
        $page   = Page::where(['type' => $params['type']])->first();

        // $page->setTranslations('title', $params['title']);
        // $page->setTranslations('description', $params['description']);
        $page->title_en         = $params['title_en'];
        $page->title_ar         = $params['title_ar'] ?? $params['title_en'];
        $page->description_en   = $params['description_en'];
        $page->description_ar   = $params['description_ar'] ?? $params['description_en'];
        $page->type             = $params['type'];
        $page->save();

        return $page;
    }
}
