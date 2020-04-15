<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SshRequest extends FormRequest
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
            'ssh_name' => 'required|string|max:100',
            'ssh_key' => 'required|string',
        ];
    }
}
