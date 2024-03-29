<?php
/*
 * This file is part of the Niga PHP framework package
 *
 * (c) Abass Dev <abass@abassdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Niga\Framework\Parser;

use Niga\Framework\Yaml\YamlParser;

/**
 * Abstract parser
 *
 * @author Abass Dev <abass@abassdev.com>
 */
abstract class AbstractParser
{
    const EXTENSION_SUP = ["json","yaml","php","sql"];
  
    public function extensionIsSupported($file)
    {
        $extension = $this->getExtension($file);
        if (in_array($extension, self::EXTENSION_SUP)) {
            return true;
        }
        return false;
    }
  
    public function parseIt($file)
    {
        $value = null;
        $extension = $this->getExtension($file);
        switch ($extension) {
            case 'yaml':
                $value = YamlParser::parseFile($file);
                break;
            case 'json':
                $value = json_decode($file);
                break;
        }
        return $value;
    }
  
    public function getFileInfo($file)
    {
        return (new \SplFileInfo($file));
    }
  
    public function getExtension($file)
    {
      
        return $this->getFileInfo($file)->getExtension();
    }
}
