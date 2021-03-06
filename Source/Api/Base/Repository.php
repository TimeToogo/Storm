<?php

namespace Penumbra\Api\Base;

use \Penumbra\Api\IRepository;
use \Penumbra\Pinq;

/**
 * The Repository provides the clean api for querying on a specific
 * type of entity.
 * 
 * @author Elliot Levin <elliot@aanet.com.au>
 */
class Repository extends Pinq\Request implements IRepository {
    
    public function GetEntityType() {
        $this->EntityType;
    }
    
    public function Add($Entity) {
        $this->EntityManager->Persist($Entity);
    }

    public function AddAll(array $Entities) {
        $this->EntityManager->PersistAll($Entities);
    }

    public function Get($_) {
        $IdentityValues = func_get_args();
        $Entity = $this->EntityManager->LoadByIdValues($IdentityValues);
        if($Entity === null) {
            throw new \Penumbra\Api\EntityNotFoundException($this->EntityType, $IdentityValues);
        }
        
        return $Entity;
    }

    public function GetOrNull($_) {
        return $this->EntityManager->LoadByIdValues(func_get_args());
    }

    public function Remove($Entity) {
        $this->EntityManager->Discard($Entity);
    }

    public function RemoveAll(array $Entities) {
        $this->EntityManager->DiscardAll($Entities);
    }

}

?>