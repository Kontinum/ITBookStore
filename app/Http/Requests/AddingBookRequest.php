<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddingBookRequest extends FormRequest
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
            'book-isbn' => 'required',
            'book-name' => 'required',
            'book-year' => 'required|digits:4',
            'book-description' => 'required',
            'books-categories' => 'required',
            'books-authors' => 'required',
            'books-price' => 'required',
            'books-picture' => 'required|url',
            'books-pages' => 'required|int',
        ];
    }
}
