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
            //
        ];
    }

    public function handle(){

        $params = $this->all();
        // dd($params);
        $page   = Page::where(['type' => $params['type']])->first();

        // $page->setTranslations('title', $params['title']);
        // $page->setTranslations('description', $params['description']);
        $page->title            = $params['title'];
        $page->description      = $params['description'];
        $page->type             = $params['type'];
        $page->save();

        return $page;
    }
}
