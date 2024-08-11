<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
            'name' => 'required|string|min:10|unique:books',
            'category_id' => 'required|string|exists:categories,category_id',
            'author_id' => 'required|exists:authors,author_id',
            'publication_date' => 'required|date',
            'price' => 'required|numeric',
            'description' => 'required|string|min:50',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ];
    }
    public function messages():array{
        return [
            'name.required' => 'Tên sách không được để trống',
            'name.min' => 'Tên có ít nhất 10 ký tự',
            'name.unique' => 'Tên sách đã tồn tại',
            'category_id.required' => 'Thể loại không được để trống',
            'category_id.exists' => 'Thể loại phải thuộc danh sách cho trước hoặc thêm mới',
            'author_id.required' => 'Tác giả không được để trống',
            'author_id.exists' => 'Tác giả phải thuộc danh sách cho trước hoặc thêm mới',
            'publication_date.required' => 'Ngày xuất bản không được để trống',
            'price.required' => 'Giá không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'description.min' => 'Mô tả phải có ít nhất 50 ký tự',
            'quantity.required' => 'Số lượng không được để trống',
            'image.mimes' => 'Ảnh không đúng định dạng',
            'image.max' => 'Ảnh kích thước tối đa 2MB',
        ];
    }
}
