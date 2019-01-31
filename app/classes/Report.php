<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\IReport;
use App\Interfaces\IResultStorage;

class Report implements IReport {

    /**
     * @param IBaseLink $baseLink
     * @param IResultStorage $resultStorage
     * @param string $folder
     * @return void
     */
    static public function generate(IBaseLink $baseLink, IResultStorage $resultStorage, string $folder) {
        $reportBody = '<html><table><tr><th>URL</th><th>Img Tags</th><th>Depth</th><th>Load Time</th></tr>';
        foreach ($resultStorage as $result) {
            $link = $result->getLink();
            $reportBody .= "<tr>" .
                "<td>{$link->getLink()}</td>" .
                "<td>{$result->getImgTags()}</td>" .
                "<td>{$link->getDepth()}</td>" .
                "<td>{$result->getLoadTime()}</td>" .
                "</tr>";
        }

        $reportBody .= "</table>";

        $filename = $baseLink->getHost() . "_" . date("d.m.Y") . ".html";

        file_put_contents($folder . "/" . $filename, $reportBody);
    }
}