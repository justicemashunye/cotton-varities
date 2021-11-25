<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\AttributeValueContract;

class AttributeValueController extends Controller
{
    //
    protected $attributevalueRepository;

    public function __construct(AttributevalueContract $attributevalueRepository)
    {
        $this->attributevalueRepository = $attributevalueRepository;
    }

    public function show($id)
    {
        $attributevalue = $this->attributevalueRepository->findAttributeValueById($id);
        return view('site.pages.attributevalue', compact('attributevalue'));
    }
}
