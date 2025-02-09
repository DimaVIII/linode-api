<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2018 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode\Entity\Managed;

use Linode\Entity\Entity;

/**
 * Information about someone Linode's special forces may contact
 * in case an issue is detected with a manager service.
 *
 * @property int    $id      This Contact's unique ID.
 * @property string $name    The name of this Contact.
 * @property string $email   The address to email this Contact to alert them of issues.
 * @property Phone  $phone   Information about how to reach this Contact by phone.
 * @property string $group   A grouping for this Contact. This is for display purposes only.
 * @property string $updated When this Contact was last updated.
 */
class ManagedContact extends Entity
{
    // Available fields.
    public const FIELD_ID    = 'id';
    public const FIELD_NAME  = 'name';
    public const FIELD_EMAIL = 'email';
    public const FIELD_PHONE = 'phone';
    public const FIELD_GROUP = 'group';

    /**
     * {@inheritdoc}
     */
    public function __get(string $name): mixed
    {
        return match ($name) {
            self::FIELD_PHONE => new Phone($this->client, $this->data[self::FIELD_PHONE]),
            default           => parent::__get($name),
        };
    }
}
