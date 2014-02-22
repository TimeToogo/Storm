<?php

namespace Storm\Drivers\Fluent\Object\Functional\Implementation\PHPParser;

class PHPParserConstantValueNode extends \PHPParser_Node_Expr {
    
    public function __construct(&$Value) {
        parent::__construct(
                [
                    'Value' => &$Value
                ], 
                []);
    }
}

?>