<?php
namespace Cyberduck\LaravelExcel\Parser;

use RuntimeException;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class BasicParser implements ParserInterface
{
    public function transform($row, $header)
    {
        if ($header) {
            //make header and row same length
            while(count($row)<count($header)){//if header is longer make row longer
                $row[]='';
            }
            while(count($header)<count($row)){//if row is longer make header longer
                $header[]='';
            }
            $row = array_combine($header, $row);

            if ($row == false) {
                throw new RuntimeException('Unvalid header');
            }
        }

        return $row;
    }
}
