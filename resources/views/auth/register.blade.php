@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div class="mb-4 md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea id="address" name="address" rows="3" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                        <select id="province" name="province" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('province') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="city_regency" class="block text-sm font-medium text-gray-700">City/Regency</label>
                        <select id="city_regency" name="city_regency" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="">Select City/Regency</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                        <select id="district" name="district" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="">Select District</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="subdistrict" class="block text-sm font-medium text-gray-700">Subdistrict</label>
                        <select id="subdistrict" name="subdistrict" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="">Select Subdistrict</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                    Register
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Already have an account? <a href="{{ route('login') }}"
                    class="text-yellow-600 hover:text-yellow-500">Login here</a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('province');
            const cityRegencySelect = document.getElementById('city_regency');
            const districtSelect = document.getElementById('district');
            const subdistrictSelect = document.getElementById('subdistrict');

            provinceSelect.addEventListener('change', function() {
                const provinceId = this.value;
                if (provinceId) {
                    fetch(`/api/regencies?province_id=${provinceId}`)
                        .then(response => response.json())
                        .then(data => {
                            cityRegencySelect.innerHTML =
                                '<option value="">Select City/Regency</option>';
                            data.forEach(regency => {
                                cityRegencySelect.innerHTML +=
                                    `<option value="${regency.id}">${regency.name}</option>`;
                            });
                            districtSelect.innerHTML = '<option value="">Select District</option>';
                            subdistrictSelect.innerHTML =
                            '<option value="">Select Subdistrict</option>';
                        });
                } else {
                    cityRegencySelect.innerHTML = '<option value="">Select City/Regency</option>';
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    subdistrictSelect.innerHTML = '<option value="">Select Subdistrict</option>';
                }
            });

            cityRegencySelect.addEventListener('change', function() {
                const regencyId = this.value;
                if (regencyId) {
                    fetch(`/api/districts?regency_id=${regencyId}`)
                        .then(response => response.json())
                        .then(data => {
                            districtSelect.innerHTML = '<option value="">Select District</option>';
                            data.forEach(district => {
                                districtSelect.innerHTML +=
                                    `<option value="${district.id}">${district.name}</option>`;
                            });
                            subdistrictSelect.innerHTML =
                            '<option value="">Select Subdistrict</option>';
                        });
                } else {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    subdistrictSelect.innerHTML = '<option value="">Select Subdistrict</option>';
                }
            });

            districtSelect.addEventListener('change', function() {
                const districtId = this.value;
                if (districtId) {
                    fetch(`/api/villages?district_id=${districtId}`)
                        .then(response => response.json())
                        .then(data => {
                            subdistrictSelect.innerHTML =
                            '<option value="">Select Subdistrict</option>';
                            data.forEach(village => {
                                subdistrictSelect.innerHTML +=
                                    `<option value="${village.id}">${village.name}</option>`;
                            });
                        });
                } else {
                    subdistrictSelect.innerHTML = '<option value="">Select Subdistrict</option>';
                }
            });

            // Set old values if validation failed
            @if (old('province'))
                provinceSelect.value = '{{ old('province') }}';
                provinceSelect.dispatchEvent(new Event('change'));
            @endif
            @if (old('city_regency'))
                setTimeout(() => {
                    cityRegencySelect.value = '{{ old('city_regency') }}';
                    cityRegencySelect.dispatchEvent(new Event('change'));
                }, 100);
            @endif
            @if (old('district'))
                setTimeout(() => {
                    districtSelect.value = '{{ old('district') }}';
                    districtSelect.dispatchEvent(new Event('change'));
                }, 200);
            @endif
            @if (old('subdistrict'))
                setTimeout(() => {
                    subdistrictSelect.value = '{{ old('subdistrict') }}';
                }, 300);
            @endif
        });
    </script>
@endsection
