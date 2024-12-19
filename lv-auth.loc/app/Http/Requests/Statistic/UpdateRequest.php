<?php

namespace App\Http\Requests\Statistic;

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
            'task_id' => '',
            'status' => '',
            'date_set' => '',
            'time_start' => '',
            'time_finish' => '',
            'datetime_completed' => '',
        ];
    }
    protected $redirect = '/dashboard';
}
