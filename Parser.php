<?php
/*
 * This file is part of the Niga PHP framework package
 *
 * (c) Abass Dev <abass@abassdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * data that was distributed with this source code.
 */

declare(strict_types=1);

namespace Niga\Framework\Parser;

use Niga\Framework\Parser\AbstractParser;

/**
 * Parser
 *
 * @author Abass Dev <abass@abassdev.com>
 */
class Parser extends AbstractParser
{
  
    private $data;
  
 /**
  * Constructor
  */
    public function __construct($data)
    {
        $this->data = $data;
      
        if (file_exists($this->data)) {
            if ($this->extensionIsSupported($this->data)) {
                $this->parseIt($this->data);
            }
        }
    }
}
