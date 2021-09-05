<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CompressImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|image',
        ];
    }

    public function messages(): array
    {
        return [
            'file.image' => 'File type is not supported',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(
            new JsonResponse(
                [
                    'status' => 'error',
                    'message' => $errors->first(),
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
