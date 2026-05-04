<?php
namespace App\Http\Requests\Main;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_name'        => ['required', 'string', 'max:255'],
            'project_description' => ['required', 'string', 'max:255'],
            'start_date'          => ['nullable', 'date'],
            'end_date'            => ['nullable', 'date'],
            'deploy_date'         => ['nullable', 'date'],
            'status'              => ['nullable', 'integer'],
            'repository_url'      => ['nullable', 'string', 'max:255'],
        ];
    }
}
