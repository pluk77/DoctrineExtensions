<?php

namespace Gedmo\Auditable\Mapping\Event\Adapter;

use Gedmo\Mapping\Event\Adapter\ORM as BaseAdapterORM;
use Gedmo\Auditable\Mapping\Event\AuditableAdapter;

/**
 * Doctrine event adapter for ORM adapted
 * for Auditable behavior.
 *
 * @author David Buchmann <mail@davidbu.ch>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
final class ORM extends BaseAdapterORM implements AuditableAdapter
{
}
