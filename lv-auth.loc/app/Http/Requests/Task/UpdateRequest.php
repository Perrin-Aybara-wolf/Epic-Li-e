<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => '',
            'name' => '',
            'description' => '',
            'seria_now' => '',
            'max_seria' => '',
            'datetime_start' => '',
            'datetime_finish' => '',
            'complexity' => '',
            'rep_days_week' => '',
            'rep_val' => '',
            'val_to_rep' => '',
        ];
    }
    protected $redirect = '/dashboard';
}
