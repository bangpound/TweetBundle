<?php

namespace Bangpound\Twitter\DataBundle\Datagrid;

use Sonata\DoctrineORMAdminBundle\Datagrid\Pager as BasePager;
use Doctrine\ORM\Query;

class Pager extends BasePager
{

    public function init()
    {
        $where = $this->getQuery()->getQueryBuilder()->getDQLPart('where');
        if (!empty($where))
        {
            parent::init();
        }
        else
        {
            $this->resetIterator();

            $this->getQuery()->setFirstResult(null);
            $this->getQuery()->setMaxResults(null);

            if (count($this->getParameters()) > 0) {
                $this->getQuery()->setParameters($this->getParameters());
            }

            if (0 == $this->getPage() || 0 == $this->getMaxPerPage()) {
                $this->setLastPage(0);
            } else {
                $offset = ($this->getPage() - 1) * $this->getMaxPerPage();

                $this->getQuery()->setFirstResult($offset);
                $this->getQuery()->setMaxResults($this->getMaxPerPage());
            }
        }
    }
}