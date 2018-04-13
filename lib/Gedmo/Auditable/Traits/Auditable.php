<?php

namespace Gedmo\Auditable\Traits;

/**
 * Auditable Trait, usable with PHP >= 5.4
 *
 * @author David Buchmann <mail@davidbu.ch>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
trait Auditable
{
    /**
     * @var string
     */
    private $createdBy;

    /**
     * @var string
     */
    private $updatedBy;

    /**
     * Sets createdBy.
     *
     * @param  string $createdBy
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Returns createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Sets updating_facility
     *
     * @param  string $facility
     * @return $this
     */
        public function setUpdaterFacility($facility)
    {
        $this->updating_facility = $facility;

        return $this;
    }

    /**
     * Returns updating_facility
     *
     * @return string
     */
    public function getUpdaterFacility()
    {
        return $this->updating_facility;
    }
}
