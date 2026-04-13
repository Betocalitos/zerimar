<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'images' => 'required|array|max:10',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:max_width=1920,max_height=1372',
        ];
    }

    public function messages()
    {
        return [
            'images.required' => 'Debes seleccionar al menos una imagen.',
            'images.array' => 'Las imágenes deben enviarse como una lista.',
            'images.max' => 'No se pueden subir más de 10 imágenes a la vez.',
            'images.*.required' => 'Cada imagen es obligatoria.',
            'images.*.image' => 'El archivo debe ser una imagen.',
            'images.*.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WebP.',
            'images.*.max' => 'La imagen no debe superar los 2MB.',
            'images.*.dimensions' => 'La imagen no debe superar 1920x1372 píxeles.',
        ];
    }
}