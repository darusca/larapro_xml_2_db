<?php

namespace Eon\Dario;

use App\Http\Controllers\Controller;
use Eon\Dario\XmlValidationUtility as XmlValidator;
use Illuminate\Http\Request;

class XmlOutputController extends Controller
{
    private $xmlOutputRepo;

    public function __construct(XmlOutputRepository $xmlOutputRepository)
    {
        $this->xmlOutputRepo = $xmlOutputRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function receive()
    {
        XmlValidationUtility::getXml();
        return view(
            'eon.dario.receive',
            [
                'xmlOutput' => XmlValidator::getXmlOutput(),
                'xmlFileName' => XmlValidator::getXmlFilePathBaseName()
            ]
        );
    }

    /**
     * @param Request $request
     * @return string
     */
    public function create(Request $request)
    {
        $xmlOutputData['title'] = $request['title'];
        $xmlOutputData['description'] = $request['description'];
        $xmlOutputData['launch_url'] = $request['launchUrl'];
        $xmlOutputData['icon_url'] = $request['iconUrl'];

        if ($this->xmlOutputRepo->save($xmlOutputData)) {
            return response()->json(['success' => 'XML data saved successfully']);
        }
        return response()->json(['error' => 'XML data not saved']);
    }
}
