<?php

namespace App\Http\Requests\Admin\Editor;

use App\Core\Request\AuditableRequest;
use App\Helper\Common;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateContentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'id' => [],
            'content' => 'required'
        ];

        return Common::setRuleAuthor($rules, new AuditableRequest());
    }

    public function prepareForValidation()
    {
        Common::setRequestAuthor($this);
    }
}
