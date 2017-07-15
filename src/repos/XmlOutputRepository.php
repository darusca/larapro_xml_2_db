<?php

namespace Eon\Dario;

class XmlOutputRepository implements RepositoryInterface
{
    /**
     * @param array $xmlOutputData
     * @return boolean
     */
    public function save($xmlOutputData)
    {
        if (isset($xmlOutputData)) {
            XmlOutputModel::create($xmlOutputData);
            return $xmlOutputData['title'];
        }
        return true;
    }
}
