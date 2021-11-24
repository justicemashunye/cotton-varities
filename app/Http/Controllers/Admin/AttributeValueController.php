<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\AttributeValueContract;
use App\Http\Controllers\BaseController;
use App\Contracts\AttributeContract;
use App\Contracts\VarietyContract;

class AttributeValueController extends BaseController
{
    
    protected $attributeRepository;

    protected $attributevalueRepository;

    protected $varietyRepository;



    public function __construct(AttributeValueContract $attributevalueRepository,
    AttributeContract $attributeRepository,
    VarietyContract $varietyRepository
    )
    {
        $this->attributevalueRepository = $attributevalueRepository;
        $this->attributeRepository = $attributeRepository;
        $this->varietyRepository = $varietyRepository;
    }

    public function index()
    {
        $attributevalues = $this->attributevalueRepository->listAttributeValues();

            $this->setPageTitle('AttributeValues', 'List of all attributevalues');
            return view('admin.attributevalues.index', compact('attributevalues'));
    }

    public function create()
    {
        
        $varieties = $this->varietyRepository->listVarieties('name', 'asc');

        $attributes = $this->attributeRepository->listAttributes('name', 'asc');


        $this->setPageTitle('AttributeValues', 'Create AttributeValue');
        return view('admin.attributevalues.create', compact('varieties', 'attributes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'value'      =>  'required|max:191',
            'variety_id'      =>  'required',
            'attribute_id'      =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $attributevalue = $this->attributevalueRepository->createAttributeValue($params);

        if (!$attributevalue) {
            return $this->responseRedirectBack('Error occurred while creating attributevalue.', 'error', true, true);
        }
        return $this->responseRedirect('admin.attributevalues.index', 'AttributeValue added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $varieties = $this->varietyRepository->listVarieties('name', 'asc');

        $attributes = $this->attributeRepository->listAttributes('name', 'asc');

        $attributevalue = $this->attributevalueRepository->findAttributevalueById($id);

        $this->setPageTitle('Attributevalues', 'Edit Attributevalue : '.$attributevalue->name);
        return view('admin.attributevalues.edit', compact('attributevalue','attributes','varieties'));
    }

        
    public function update(Request $request)
    {
        $this->validate($request, [
            'value'      =>  'required|max:191',
            'variety_id'      =>  'required',
            'attribute_id'      =>  'required',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $attributevalue = $this->attributevalueRepository->updateAttributevalue($params);

        if (!$attributevalue) {
            return $this->responseRedirectBack('Error occurred while updating attributevalue.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attributevalue updated successfully' ,'success',false, false);
    }



    
}