<?php

namespace Storm\Drivers\Platforms\Base;

use \Storm\Drivers\Base\Mapping;
use \Storm\Drivers\Base\Relational;

abstract class Platform extends Mapping\Platform {
    public function __construct(
            Relational\IPlatform $RelationalPlatform,
            Mapping\Expressions\IValueMapper $ValueMapper,
            Mapping\Expressions\IArrayMapper $ArrayMapper,
            Mapping\Expressions\IOperationMapper $OperationMapper,
            Mapping\Expressions\IFunctionMapper $FunctionMapper,
            Mapping\Expressions\IAggregateMapper $AggregateMapper,
            Mapping\Expressions\IControlFlowMapper $ControlFlowMapper) {
        
        parent::__construct($RelationalPlatform,
                $ValueMapper,
                $ArrayMapper,
                $OperationMapper,
                $FunctionMapper,
                $AggregateMapper,
                $this->TypeMappers(),
                $ControlFlowMapper);
    }
    
    protected abstract function TypeMappers();
}

?>