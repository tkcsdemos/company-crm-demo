<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class FilterCompanies extends Component
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
            $companies = Company::with('employees')->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        }
        else {
            $companies = Company::with('employees')->paginate(10);
        }
        

        return view('livewire.filter-companies', compact('companies'));
    }
}
