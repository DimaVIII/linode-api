<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2018 Artem Rodygin
//
//  You should have received a copy of the MIT License along with
//  this file. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode\Entity;

/**
 * Linux kernel object.
 *
 * @property string $id           The unique ID of this Kernel.
 * @property string $label        The friendly name of this Kernel.
 * @property string $version      Linux Kernel version.
 * @property string $architecture The architecture of this Kernel.
 * @property bool   $kvm          If this Kernel is suitable for KVM Linodes.
 * @property bool   $xen          If this Kernel is suitable for Xen Linodes.
 * @property bool   $pvops        If this Kernel is suitable for paravirtualized operations.
 */
class Kernel extends Entity
{
}
