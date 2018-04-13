<?php

namespace Gedmo\Auditable\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Auditable Trait, usable with PHP >= 5.4
 *
 * @author David Buchmann <mail@davidbu.ch>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
trait AuditableEntity
{
    /**
     * @var Facility $facility
     * 
     * @Gedmo\Auditable(on="create")
     * @ORM\ManyToOne(targetEntity="App\Entity\Facility")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $creater_facility;

    /**
     * @var Facility $facility
     * 
     * @Gedmo\Auditable(on="update")
     * @ORM\ManyToOne(targetEntity="App\Entity\Facility")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $updating_facility;

    /**
     * Sets createdBy.
     *
     * @param  mixed $facility
     * @return $this
     */
    public function setCreaterFacility($facility)
    {
        $this->creater_facility = $facility;

        return $this;
    }

    /**
     * Returns createdBy.
     *
     * @return string
     */
    public function getCreaterFacility()
    {
        return $this->creater_facility;
    }

    /**
     * Sets $facility.
     *
     * @param  mixed $facility
     * @return $this
     */
    public function setUpdaterFacility($facility)
    {
        $this->updating_facility = $facility;

        return $this;
    }

    /**
     * Returns updatedBy.
     *
     * @return mixed
     */
    public function getUpdaterFacility()
    {
        return $this->updating_facility;
    }
}
