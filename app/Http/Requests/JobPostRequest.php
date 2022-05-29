<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'function_area_id'=>['required','numeric'],
            'title'=>['required','string'],
            'vancy'=>['required','string'],
            'expire_date'=>['required','date'],
            'gender'=>['required','string','in:male,female,any'],
            'language'=>['sometimes','string'],
            'salary'=>['sometimes'],
            'contract_preiod'=>['sometimes','string'],
            'location' => ['required', 'string'],
            'apply_email'=>['sometimes','email', 'unique:job_posts'],
            'apply_form'=>['sometimes','url'],
            'company_information'=>['required','string'],
            'job_description'=>['required','string'],
            'job_requirements'=>['required','string'],
            'apply_description' => ['required', 'string'],
            'time'=>['required','string','in:part_time,full_time'],
            'experince'=>['sometimes','string']
        ];
    }

    protected function prepareForValidation()
    {
        if($this->language==null){
            $this->request->remove('language');
        }

        if ($this->salary == null) {
            $this->request->remove('salary');
        }

        if ($this->contract_preiod == null) {
            $this->request->remove('contract_preiod');
        }

        if ($this->apply_email == null) {
            $this->request->remove('apply_email');
        }
        
        if ($this->apply_form == null) {
            $this->request->remove('apply_form');
        }

        if ($this->experince == null) {
            $this->request->remove('experince');
        }
    }
}
