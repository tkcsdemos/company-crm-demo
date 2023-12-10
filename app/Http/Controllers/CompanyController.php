<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * loads default page
     *
     * @return View
     */
    public function index(): View 
    {
        return view('companies.index');
    }

    /**
     * loads default create company view
     *
     * @return View
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Stores the created company
     *
     * @param CompanyCreateRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(CompanyCreateRequest $request): RedirectResponse 
    {

        $data = $request->validated();

        $data['logo'] = $this->setFile($request->input('logo'));

        Company::create($data);

        return redirect('companies')->with('status', 'company-created');
    }

    /**
     * shows the row
     *
     * @param Company $company
     * @return View
     */
    public function show(Company $company):? View 
    {
        return null;
    }

    /**
     * Initializes the update form view
     *
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View 
    {
        return view('companies.update', compact('company'));
    }

    /**
     * Updates the company row
     *
     * @param CompanyUpdateRequest $request
     * @param Company $company
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse 
    {

        $data = $request->validated();
        $old_logo = $request->get('old_logo', '');
        $name = $this->setFile($request->input('logo'), $old_logo);

        if (empty($name) && !empty($company->logo) ) {
            $this->removeLogo($company->logo);
        }

        $data['logo'] = $name;

        $company->update($data);

        $company->save();

        return redirect('companies')->with('status', 'company-updated');

    }

    /**
     * Deletes the requested company row
     *
     * @param Company $company
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse 
    {
        if (!empty($company->logo) ) {
            $this->removeLogo($company->logo);
        }

        $company->delete();

        return redirect('companies')->with('status', 'company-deleted');
    
    }

    /**
     * Saves the uploaded logo to public disc logos directory and returns the generated filename
     *
     * @param mixed $file
     * @param string $old_logo
     * @return string
     */
    private function setFile($file, string $old_logo = ''): string 
    {
        $name = $old_logo;
        if ($file) {
            $this->removeLogo($old_logo);
            $name = now()->timestamp."_{$file->getClientOriginalName()}";
            $file->storeAs('logos', $name, 'public');
        }

        return $name;
    }

    /**
     * removes logo if exists
     *
     * @param string $logo
     * @return void
     */
    private function removeLogo(string $logo): void 
    {
        // remove old logo
        // dd(asset('storage/logos/' . $logo));
        $storage = Storage::disk('public');
        if ($storage->exists(('logos/' . $logo))) {
            $storage->delete(('logos/' . $logo));
        }
    }
}
