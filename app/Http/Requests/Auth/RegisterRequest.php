<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation (Sanitization & XSS prevention).
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => is_string($this->name) ? strip_tags(trim($this->name)) : null,
            'email' => is_string($this->email) ? Str::lower(trim($this->email)) : null,
            'phone' => is_string($this->phone) ? preg_replace('/[^\d\+\-\(\)\s]/', '', trim($this->phone)) : null,
            'city' => is_string($this->city) ? strip_tags(trim($this->city)) : null,
            'postal_code' => is_string($this->postal_code) ? preg_replace('/[^\d]/', '', trim($this->postal_code)) : null,
            'address' => is_string($this->address) ? strip_tags(trim($this->address)) : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->ensureIsNotRateLimited();

        return [
            'name' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\pL\s\.\,\'\-]+$/u',
            ],
            'email' => [
                'required',
                'string',
                'email:rfc',
                'max:255',
                'unique:users,email',
            ],
            'phone' => [
                'required',
                'string',
                'min:9',
                'max:20',
                'regex:/^[0-9\+\-\s\(\)]{9,20}$/',
            ],
            'province' => [
                'required',
                'string',
                'in:Bali,Jawa Timur,Jawa Tengah,DI Yogyakarta,Jawa Barat,DKI Jakarta,Banten,Lainnya',
            ],
            'city' => [
                'required',
                'string',
                'max:100',
                'regex:/^[\pL\s\.\,\'\-]+$/u',
            ],
            'postal_code' => [
                'required',
                'string',
                'min:4',
                'max:10',
                'regex:/^[0-9]{4,10}$/',
            ],
            'address' => [
                'required',
                'string',
                'min:8',
                'max:1000',
            ],
            'password' => [
                'required',
                'string',
                Password::min(8)->letters()->numbers(),
                'confirmed',
            ],
        ];
    }

    /**
     * Custom validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.regex' => 'Nama hanya boleh mengandung huruf, spasi, titik, koma, dan tanda hubung.',
            'city.regex' => 'Nama kota/kabupaten hanya boleh mengandung karakter yang valid.',
            'phone.regex' => 'Format nomor telepon tidak valid. Gunakan format angka yang benar.',
            'postal_code.regex' => 'Kode pos harus berupa kombinasi angka valid.',
            'password.min' => 'Kata sandi minimal terdiri dari 8 karakter dengan kombinasi huruf dan angka.',
            'email.unique' => 'Alamat email ini sudah terdaftar. Silakan gunakan email lain atau masuk ke akun Anda.',
            'province.in' => 'Silakan pilih provinsi yang valid dari daftar pilihan.',
        ];
    }

    /**
     * Ensure register attempts are rate limited per IP.
     *
     * @throws ValidationException
     */
    protected function ensureIsNotRateLimited(): void
    {
        $key = 'register:'.$this->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            throw ValidationException::withMessages([
                'email' => "Terlalu banyak permintaan pendaftaran dari jaringan Anda. Silakan coba lagi dalam {$seconds} detik.",
            ]);
        }

        RateLimiter::hit($key, 60);
    }
}
