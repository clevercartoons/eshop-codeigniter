<?php

namespace Infoamin\Installer\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Infoamin\Installer\Helpers\RequirementsChecker;

class RequirementsController extends Controller
{
    /**
     * @var RequirementsChecker
     */
    protected $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirements = $checker;
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {

        $phpSupportInfo = $this->requirements->checkPHPversion(config('installer.core.minimumPhpVersion'));
        $requirements   = $this->requirements->check(config('installer.requirements'));
        return view('packages.installer.requirements', compact('requirements', 'phpSupportInfo'));
    }
}
