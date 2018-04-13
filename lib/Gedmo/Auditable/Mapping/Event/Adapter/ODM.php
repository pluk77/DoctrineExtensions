<?php

namespace Gedmo\Auditable\Mapping\Event\Adapter;

use Gedmo\Mapping\Event\Adapter\ODM as BaseAdapterODM;
use Gedmo\Auditable\Mapping\Event\AuditableAdapter;

/**
 * Doctrine event adapter for ODM adapted
 * for Auditable behavior.
 *
 * @author David Buchmann <mail@davidbu.ch>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
final class ODM extends BaseAdapterODM implements AuditableAdapter
{
}
