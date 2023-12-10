<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col rounded-lg border dark:border-neutral-600 py-12">
    <div class="actions pb-6 flex flex-row justify-between">
        <div>
            <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded display-inline-block">{{ __('Create new employee') }}</a>
        </div>
        <div>
            <input wire:model.live="search" type="text" placeholder="Search employees by name...">
        </div>
    </div>
    
    <table class="border-collapse border border-slate-400 w-full text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="border border-slate-300 px-6 py-3">Name</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Email</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Phone</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Company</th>
                <th scope="col" class="border border-slate-300 px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td class="border border-slate-300 px-6 py-3">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td class="border border-slate-300 px-6 py-3">{{ $employee->email }}</td>
                <td class="border border-slate-300 px-6 py-3">{{ $employee->phone }}</td>
                <td class="border border-slate-300 px-6 py-3">{{ $employee->company->name }}</td>
                <td class="border border-slate-300 px-6 py-3">
                    <div class="flex flex-row align-center justify-center">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded display-inline-block mr-2">{{ __('Edit') }}</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
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
    {{ $employees->links() }}
</div>
