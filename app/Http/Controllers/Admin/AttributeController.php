<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Contracts\AttributeContract;
use App\Contracts\VarietyContract;

class AttributeController extends BaseController
{
    //
    protected $attributeRepository;
    protected $varietyRepository;

    public function __construct(AttributeContract $attributeRepository,VarietyContract $varietyRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->varietyRepository = $varietyRepository;
    }

    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();

        $this->setPageTitle('Attributes', 'List of all attributes');
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        $varieties = $this->varietyRepository->listVarieties('name', 'asc');

        $this->setPageTitle('Attributes', 'Create Attribute');
        return view('admin.attributes.create', compact('varieties'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          =>  'required',
            'variety_id' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->createAttribute($params);

        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.index', 'Attribute added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $varieties = $this->varietyRepository->listVarieties('name', 'asc');
        $attribute = $this->attributeRepository->findAttributeById($id);

        $this->setPageTitle('Attributes', 'Edit Attribute : '.$attribute->name);
        return view('admin.attributes.edit', compact('varieties','attribute'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'          =>  'required',
            'variety_id' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->updateAttribute($params);

        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while updating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute updated successfully' ,'success',false, false);
    }



}