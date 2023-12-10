<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row">
    <div class="bg-blue-300 overflow-hidden shadow-sm sm:rounded-lg m-4 col-span-1 flex-1 w-5">
        <div class="p-6 text-white flex flex-col text-center">
            <span class="text-lg font-semibold">
                {{ __("Companies") }}
            </span>
            <span>
                {{$total_companies}}
            </span>
        </div>
    </div>
    <div class="bg-blue-300 overflow-hidden shadow-sm sm:rounded-lg m-4 col-span-1 flex-1 w-5">
        <div class="p-6 text-white flex flex-col text-center">
            <span class="text-lg font-semibold">
                {{ __("Employees") }}
            </span>
            <span>
                {{$total_employees}}
            </span>
        </div>
    </div>
</div>