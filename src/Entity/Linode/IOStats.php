<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2018 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode\Entity\Linode;

use Linode\Entity\Entity;
use Linode\Entity\TimeValue;

/**
 * Input/Output statistics.
 *
 * Graph data is in "[timestamp, reading]" array format.
 * Timestamp is a UNIX timestamp in EST.
 *
 * @property array|TimeValue[] $io
 * @property array|TimeValue[] $swap
 */
class IOStats extends Entity
{
    /**
     * {@inheritdoc}
     */
    public function __get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return array_map(function ($data) {
                return new TimeValue((int) $data[0], (float) $data[1]);
            }, $this->data[$name]);
        }

        return null;
    }
}
