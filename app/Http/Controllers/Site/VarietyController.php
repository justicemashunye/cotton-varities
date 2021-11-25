<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\VarietyContract;

class VarietyController extends Controller
{
    protected $varietyRepository;

    public function __construct(VarietyContract $varietyRepository)
    {
        $this->varietyRepository = $varietyRepository;
    }

    public function show($slug)
    {
        $variety = $this->varietyRepository->findBySlug($slug);
        return view('site.pages.variety', compact('variety'));
    }

}