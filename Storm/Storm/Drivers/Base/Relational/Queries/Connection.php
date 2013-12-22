<?php

namespace Storm\Drivers\Base\Relational\Queries;

abstract class Connection implements IConnection {
    /**
     * @var IIdentifierEscaper 
     */
    protected $IdentifierEscaper;
    /**
     * @var IExpressionCompiler 
     */
    protected $ExpressionCompiler;
    /**
     * @var IRequestCompiler 
     */
    protected $RequestCompiler;
    /**
     * @var IPredicateCompiler 
     */
    protected $PredicateCompiler;
    
    final public function SetExpressionCompiler(IExpressionCompiler $ExpressionCompiler) {
        $this->ExpressionCompiler = $ExpressionCompiler;
    }
        
    final public function SetIdentifierEscaper(IIdentifierEscaper $IdentifierEscaper) {
        $this->IdentifierEscaper = $IdentifierEscaper;
    }
    
    final public function SetRequestCompiler(IRequestCompiler $RequestCompiler) {
        $this->RequestCompiler = $RequestCompiler;
    }
    
    final public function SetPredicateCompiler(IPredicateCompiler $PredicateCompiler) {
        $this->PredicateCompiler = $PredicateCompiler;
    }
}

?>
