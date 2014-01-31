<?php

namespace Storm\Drivers\Base\Mapping\Mappings;

use \Storm\Core\Mapping;
use \Storm\Core\Object;

abstract class PropertyMapping implements Mapping\IPropertyMapping {
    /**
     * @var Object\IProperty
     */
    protected $Property;
    
    public function __construct(Object\IProperty $Property) {
        $this->Property = $Property;
    }
    
    /**
     * @return Object\IProperty
     */
    final public function GetProperty() {
        return $this->Property;
    }
}

?>