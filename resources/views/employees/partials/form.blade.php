<div>
    <x-input-label for="first_name" :value="__('First name')" />
    <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', isset($employee) ? $employee->first_name : '')"  autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
</div>

<div>
    <x-input-label for="last_name" :value="__('Last name')" />
    <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', isset($employee) ? $employee->last_name : '')"  autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
</div>

<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', isset($employee) ? $employee->email : '')" />
    <x-input-error class="mt-2" :messages="$errors->get('email')" />
</div>

<div>
    <x-input-label for="phone" :value="__('Phone')" />
    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', isset($employee) ? $employee->phone : '')"  autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
</div>

<div>
    <x-input-label for="company_id" :value="__('Works for company')" />
    <select name="company_id" id="company_id">
        @foreach ($companies as $company)
        <option value="{{ $company->id }}" {{ isset($employee) && $company->id == $employee->company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('company_id')" />
</div>


