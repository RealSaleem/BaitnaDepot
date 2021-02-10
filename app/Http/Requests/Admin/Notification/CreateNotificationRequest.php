<?php

namespace App\Http\Requests\Admin\Notification;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Notification;


class CreateNotificationRequest extends FormRequest
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
        $Notification = new Notification();
        $Notification->title    = $NotificationReq['title'];
        $Notification->body     = $NotificationReq['body'];
        $Notification->url      = $NotificationReq['url'];

        if($this->hasFile('image'))
        {
            //$imagename = $this->file('image')->getClientOriginalName();
            $image_path = $this->file('image')->store('uploads/images/notification');

            

            // $image_path = env('IMAGE_BASE_URL').$image_path;

            //$image = $this->file('image');
           
            //$destination = $image->move(public_path('Images/Notification'), $imagename);
            $Notification->image = $image_path;
        }

        $Notification->save();
        return $Notification;

        
    }
}
