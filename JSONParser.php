<?php declare(strict_types=1);
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * data that was distributed with this source code.
 */


namespace Nigatedev\Framework\Parser;

use Nigatedev\Framework\Parser\Exception\ParseException;

/**
 * JSONParser
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class JSONParser
{
    
    /**
     * JSON Decoder
     *
     * @param string $path          Path to the file
     * @param string $filename      The file name
     *
     * @return mixed
     *
     * @throws ParseException
     */
    public static function parseJFile($path, $filename)
    {
        $file = "{$path}{$filename}";
       
        if (is_dir($path) && file_exists($file)) {
            $extension = new \SplFileInfo($file);
           
            if ($extension->getExtension() === "json") {
                $content = file_get_contents($file);
                return json_decode($content, true);
            } else {
                throw new ParseException("Unable to parse, bad extension ! :");
            }
        } else {
            throw new ParseException("Unable to parse:");
        }
    }
}
