<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\VarietyContract;
use App\Http\Controllers\BaseController;

class VarietyController extends BaseController
{
    
    public function __construct(VarietyContract $varietyRepository)
    {
        $this->varietyRepository = $varietyRepository;
    }

    public function index()
    {
        $varieties = $this->varietyRepository->listVarieties();

            $this->setPageTitle('Varieties', 'List of all varieties');
            return view('admin.varieties.index', compact('varieties'));
    }

    public function create()
    {
        $this->setPageTitle('Varieties', 'Create Variety');
        return view('admin.varieties.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $variety = $this->varietyRepository->createVariety($params);

        if (!$variety) {
            return $this->responseRedirectBack('Error occurred while creating variety.', 'error', true, true);
        }
        return $this->responseRedirect('admin.varieties.index', 'Variety added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $variety = $this->varietyRepository->findVarietyById($id);
        $this->setPageTitle('Varieties', 'Edit Variety : '.$variety->name);
        return view('admin.varieties.edit', compact('variety'));
    }

        
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $variety = $this->varietyRepository->updateVariety($params);

        if (!$variety) {
            return $this->responseRedirectBack('Error occurred while updating variety.', 'error', true, true);
        }
        return $this->responseRedirectBack('Variety updated successfully' ,'success',false, false);
    }


}