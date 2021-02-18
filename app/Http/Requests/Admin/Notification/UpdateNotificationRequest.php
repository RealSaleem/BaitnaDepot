<?php

namespace App\Http\Requests\Admin\Notification;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Notification;

class UpdateNotificationRequest extends FormRequest
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
            'title'     => ['required'],
            'body'      => ['required'],
            'url'       => ['required'],
            'image'     => ['nullable','image','mimes:jpeg,jpg,png']

        ];
    }


    public function handle()
    {
        $NotificationReq = $this->all();
        $id = $NotificationReq['id'];

        $Notification           = Notification::find($id);
        $Notification->title    = $NotificationReq['title'];
        $Notification->body     = $NotificationReq['body'];
        $Notification->url      = $NotificationReq['url'];

         if($this->hasFile('image'))
         {
             $image_path = $this->file('image')->store('uploads/images/notification');
             // $image_path = env('IMAGE_BASE_URL').$image_path;
             $Notification->image = $image_path;
         }

        $Notification->save();
        return $Notification;

    }
}
