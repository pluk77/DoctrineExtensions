<?php

namespace Gedmo\Auditable\Mapping\Driver;

use Gedmo\Mapping\Driver\AbstractAnnotationDriver;
use Gedmo\Exception\InvalidMappingException;

/**
 * This is an annotation mapping driver for Auditable
 * behavioral extension. Used for extraction of extended
 * metadata from Annotations specifically for Auditable
 * extension.
 *
 * @author David Buchmann <mail@davidbu.ch>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Annotation extends AbstractAnnotationDriver
{
    /**
     * Annotation field is auditable
     */
    const AUDITABLE = 'Gedmo\\Mapping\\Annotation\\Auditable';

    /**
     * List of types which are valid for audit
     *
     * @var array
     */
    protected $validTypes = array(
        'one',
        'string',
        'int',
    );

    /**
     * {@inheritDoc}
     */
    public function readExtendedMetadata($meta, array &$config)
    {
        $class = $this->getMetaReflectionClass($meta);
        // property annotations
        foreach ($class->getProperties() as $property) {
            if ($meta->isMappedSuperclass && !$property->isPrivate() ||
                $meta->isInheritedField($property->name) ||
                isset($meta->associationMappings[$property->name]['inherited'])
            ) {
                continue;
            }
            if ($auditable = $this->reader->getPropertyAnnotation($property, self::AUDITABLE)) {
                $field = $property->getName();

                if (!$meta->hasField($field) && !$meta->hasAssociation($field)) {
                    throw new InvalidMappingException("Unable to find auditable [{$field}] as mapped property in entity - {$meta->name}");
                }
                if ($meta->hasField($field)) {
                    if ( !$this->isValidField($meta, $field)) {
                        throw new InvalidMappingException("Field - [{$field}] type is not valid and must be 'string' or a one-to-many relation in class - {$meta->name}");
                    }
                } else {
                    // association
                    if (! $meta->isSingleValuedAssociation($field)) {
                        throw new InvalidMappingException("Association - [{$field}] is not valid, it must be a one-to-many relation or a string field - {$meta->name}");
                    }
                }
                if (!in_array($auditable->on, array('update', 'create', 'change'))) {
                    throw new InvalidMappingException("Field - [{$field}] trigger 'on' is not one of [update, create, change] in class - {$meta->name}");
                }
                if ($auditable->on == 'change') {
                    if (!isset($auditable->field)) {
                        throw new InvalidMappingException("Missing parameters on property - {$field}, field must be set on [change] trigger in class - {$meta->name}");
                    }
                    if (is_array($auditable->field) && isset($auditable->value)) {
                        throw new InvalidMappingException("Auditable extension does not support multiple value changeset detection yet.");
                    }
                    $field = array(
                        'field' => $field,
                        'trackedField' => $auditable->field,
                        'value' => $auditable->value,
                    );
                }
                // properties are unique and mapper checks that, no risk here
                $config[$auditable->on][] = $field;
            }
        }
    }
}
