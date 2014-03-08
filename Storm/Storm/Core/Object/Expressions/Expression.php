<?php

namespace Storm\Core\Object\Expressions;

use Storm\Core\Object\IProperty;

/**
 * The base class for object expressions.
 * 
 * @author Elliot Levin <elliot@aanet.com.au>
 */
abstract class Expression {
    use \Storm\Core\Helpers\Type;
    
    public abstract function Traverse(ExpressionWalker $Walker);
    
    public abstract function Simplify();
    
    final protected static function SimplifyAll(array $Expressions) {
        $ReducedExpressions = [];
        foreach($Expressions as $Key => $Expression) {
            $ReducedExpressions[$Key] = $Expression->Simplify();
        }
        
        return $ReducedExpressions;
    }
    
    final protected static function AllOfType(array $Expressions, $Type) {
        foreach ($Expressions as $Expression) {
            if(!($Expression instanceof $Type)) {
                return false;
            }
        }
        
        return true;
    }


    // <editor-fold defaultstate="collapsed" desc="Factory Methods">
    

    /**
     * @return AssignmentExpression
     */
    final public static function Assign(
            Expression $AssignToValueExpression, 
            $AssignmentOperator,
            Expression $AssignmentValueExpression) {
        return new AssignmentExpression($AssignToValueExpression, $AssignmentOperator, $AssignmentValueExpression);
    }
    
    /**
     * @return BinaryOperationExpression
     */
    final public static function BinaryOperation(Expression $LeftOperandExpression, $Operator, Expression $RightOperandExpression) {
        return new BinaryOperationExpression($LeftOperandExpression, $Operator, $RightOperandExpression);
    }
    
    /**
     * @return UnaryOperationExpression
     */
    final public static function UnaryOperation($UnaryOperator, Expression $OperandExpression) {
        return new UnaryOperationExpression($UnaryOperator, $OperandExpression);
    }
    
    /**
     * @return EntityExpression
     */
    final public static function Entity() {
        return new EntityExpression();
    }
    
    /**
     * @return NewExpression
     */
    final public static function Constructor($ClassType, array $ArgumentValueExpressions = []) {
        return new NewExpression($ClassType, $ArgumentValueExpressions);
    }
    
    /**
     * @return MethodCallExpression
     */
    final public static function MethodCall(Expression $ValueExpression, $Name, array $ArgumentValueExpressions = []) {
        return new MethodCallExpression($ValueExpression, $Name, $ArgumentValueExpressions);
    }
    
    /**
     * @return FieldExpression
     */
    final public static function Field(Expression $ValueExpression, $Name) {
        return new FieldExpression($ValueExpression, $Name);
    }
    
    /**
     * @return IndexExpression
     */
    final public static function Index(Expression $ValueExpression, $Index) {
        return new IndexExpression($ValueExpression, $Index);
    }
    
    /**
     * @return InvocationExpression
     */
    final public static function Invocation(Expression $ValueExpression, array $ArgumentExpressions) {
        return new InvocationExpression($ValueExpression, $ArgumentExpressions);
    }
    
    /**
     * @return CastExpression
     */
    final public static function Cast($CastType, Expression $CastValueExpression) {
        return new CastExpression($CastType, $CastValueExpression);
    }
    
    /**
     * @return FunctionCallExpression
     */
    final public static function FunctionCall($Name, array $ArgumentValueExpressions = []) {
        return new FunctionCallExpression($Name, $ArgumentValueExpressions);
    }
    
    
    /**
     * @return TernaryExpression
     */
    final public static function Ternary(
            Expression $ConditionExpression,
            Expression $IfTrueExpression, 
            Expression $IfFalseExpression) {
        return new TernaryExpression($ConditionExpression, $IfTrueExpression, $IfFalseExpression);
    }
    
    /**
     * @return ReturnExpression
     */
    final public static function ReturnExpression(Expression $ValueExpression = null) {
        return new ReturnExpression($ValueExpression);
    }
    
    /**
     * @return PropertyExpression
     */
    final public static function Property(IProperty $Property) {
        return new PropertyExpression($Property);
    }
    
    /**
     * @return ValueExpression
     */
    final public static function Value($Value) {
        return new ValueExpression($Value);
    }
    
    /**
     * @return UnresolvedVariable
     */
    final public static function UnresolvedVariable($Name) {
        return new UnresolvedVariable($Name);
    }
    
    /**
     * @return ArrayExpression
     */
    final public static function NewArray(array $KeyExpressions, array $ValueExpressions) {
        return new ArrayExpression($KeyExpressions, $ValueExpressions);
    }
    // </editor-fold>
}

?>