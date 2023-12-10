<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', isset($company) ? $company->name : '')"  autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', isset($company) ? $company->email : '')"  autocomplete="username" />
    <x-input-error class="mt-2" :messages="$errors->get('email')" />
</div>

<div>
    <x-input-label for="website" :value="__('Website')" />
    <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" :value="old('website', isset($company) ? $company->website : '')"  />
    <x-input-error class="mt-2" :messages="$errors->get('website')" />
</div>

<div class="custom-file">
    <img class="w-48 h-48 py-8 object-contain hidden" src="{{ isset($company) && !empty($company->logo) ? asset('storage/logos/' . $company->logo) : '' }}" id="company-logo"/>
    @if ( isset( $company->logo) && !empty($company->logo) )
    <input type="hidden" name="old_logo" id="old-logo" value="{{ $company->logo }}" />
    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded display-inline-block" id="logo-remover" onclick="removeLogo()">{{ __('Remove logo') }}</button>
    @endif
    <input type="file" name="logo" accept="image/*" class="custom-file-input" id="chooseFile">
    <label class="custom-file-label" for="chooseFile">Select file</label>
</div>

<script>
    const file = document.querySelector('#chooseFile');
    const image = document.querySelector('#company-logo');
    const src = image.getAttribute('src');
    
    if (src) {
        image.classList.remove('hidden')
    }

    file.addEventListener('change', function(e) {
        image.src = window.URL.createObjectURL(file.files[0])
        image.classList.remove('hidden')
    })

    function removeLogo() {
        document.querySelector('#old-logo').remove()
        document.querySelector('#logo-remover').remove()

        image.src = ''
        image.classList.add('hidden')
    }
</script>

