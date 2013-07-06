<?php

namespace Bangpound\Twitter\DataBundle\Entity;

use Doctrine\DBAL\LockMode;
use Doctrine\ORM\EntityRepository;

class DataRepository extends EntityRepository
{

    /**
     * Finds a single entity by a set of criteria and lock it.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @return object
     */
    public function findAndLockOneBy(array $criteria, array $orderBy = null)
    {
        $persister = $this->_em->getUnitOfWork()->getEntityPersister($this->_entityName);

        return $persister->load($criteria, null, null, array(), LockMode::PESSIMISTIC_WRITE, 1, $orderBy);
    }
}
