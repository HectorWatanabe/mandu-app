<?php


namespace ManduApp\Support\Controller;


trait DivisionControllerSupport
{
    public function validationForm()
    {
        return [
            'upper_division' => ['nullable', 'numeric'],
            'collaborators' => ['required', 'numeric'],
            'ambassador' => ['required', 'max:250']
        ];
    }
}
