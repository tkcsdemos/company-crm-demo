<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col rounded-lg border dark:border-neutral-600 py-12">
    <div class="actions pb-6 flex flex-row justify-between">
        <div>
            <a href="{{ route('companies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded display-inline-block">{{ __('Create new company') }}</a>
        </div>
        <div>
            <input wire:model.live="search" type="text" placeholder="Search companies by name...">
        </div>
    </div>
    
    
    <table class="border-collapse border border-slate-400 w-full text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="border border-slate-300 px-6 py-3">Logo</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Name</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Email</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Website</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Employees</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
            <tr>
                <td class="border border-slate-300 px-6 py-3 text-center">
                    <img class="object-cover h-12 w-16 m-auto block" src="{{ !empty( $company->logo) ? asset('storage/logos/'.$company->logo) : asset('storage/logos/no-image.jpg') }}" />
                </td>
                <td class="border border-slate-300 px-6 py-3">{{ $company->name }}</td>
                <td class="border border-slate-300 px-6 py-3">{{ $company->email }}</td>
                <td class="border border-slate-300 px-6 py-3">{{ $company->website }}</td>
                <td class="border border-slate-300 px-6 py-3">{{ $company->employees->count() }}</td>
                <td class="border border-slate-300 px-6 py-3">
                    <div class="flex flex-row align-center justify-center">
                        <a href="{{ route('companies.edit', $company->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded display-inline-block mr-2">{{ __('Edit') }}</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded display-inline-block">{{ __('Delete') }}</a>
                        </form>
                    </div>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
</div>
