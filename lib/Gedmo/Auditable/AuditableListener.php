<?php

namespace Gedmo\Auditable;

//use Doctrine\Common\NotifyPropertyChanged;
//use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Gedmo\AbstractTrackingListener;
use Gedmo\Exception\InvalidArgumentException;
//use Gedmo\Auditable\Mapping\Event\AuditableAdapter;

/**
 * The Auditable listener handles the update of
 * facility on creation and update.
 *
 * @author Marcel Berteler <marcel.berteler@capetown.gov.za>
 * @author Gediminas Morkevicius <gediminas.morkevicius@gmail.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AuditableListener extends AbstractTrackingListener
{
    protected $facility;

    /**
     * Get the facility value to set on a Auditable field
     *
     * @param object $meta
     * @param string $field
     *
     * @return mixed
     */
    public function getFieldValue($meta, $field, $eventAdapter)
    {
        if ($meta->hasAssociation($field)) {
            if (null !== $this->facility && ! is_object($this->facility)) {
                throw new InvalidArgumentException("Blame is reference, facility must be an object");
            }

            return $this->facility;
        }

        // ok so its not an association, then it is a string
        if (is_object($this->facility)) {
            if (method_exists($this->facility, 'getFacilityName')) {
                return (string) $this->facility->getFacilityName();
            }
            if (method_exists($this->facility, '__toString')) {
                return $this->facility->__toString();
            }
            throw new InvalidArgumentException("Field expects string, facility must be a string, or object should have method getFacilityName or __toString");
        }

        return $this->facility;
    }
    
    /**
     * Set a facility value to return
     *
     * @param int $facility
     */
    public function setFacilityValue($facility)
    {
        $this->facility = $facility;
    }

    /**
     * {@inheritDoc}
     */
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
}
