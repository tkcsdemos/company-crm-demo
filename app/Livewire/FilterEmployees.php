<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FilterEmployees extends Component
{
    use WithPagination;

    public $search = '';

    public function updating($name, $value)
    {
        
        if ($name == 'search' && $value !== $this->search) {
            $this->resetPage();
        }
        
    }
    
    public function render()
    {
        if (!empty($this->search)) {
            $employees = Employee::where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'like', '%' . $this->search . '%')->paginate(10);
        }
        else {
            $employees = Employee::paginate(10);
        }
        

        return view('livewire.filter-employees', compact('employees'));
    }
}
