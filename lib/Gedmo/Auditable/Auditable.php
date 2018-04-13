<?php

namespace Gedmo\Auditable;

/**
 * This interface is not necessary but can be implemented for
 * Entities which in some cases needs to be identified as
 * Auditable
 *
 * @author Marcel Berteler <marcel.berteler@capetown.gov.za>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
interface Auditable
{
    // auditable expects annotations on properties

    /**
     * @gedmo:Auditable(on="create")
     * fields which should be updated on insert only
     */

    /**
     * @gedmo:Auditable(on="update")
     * fields which should be updated on update and insert
     */

    /**
     * @gedmo:Auditable(on="change", field="field", value="value")
     * fields which should be updated on changed "property"
     * value and become equal to given "value"
     */

    /**
     * @gedmo:Auditable(on="change", field="field")
     * fields which should be updated on changed "property"
     */

    /**
     * @gedmo:Auditable(on="change", fields={"field1", "field2"})
     * fields which should be updated if at least one of the given fields changed
     */

    /**
     * example
     *
     * @gedmo:Auditable(on="create")
     * @Column(type="string")
     * $created_facility
     */
}
