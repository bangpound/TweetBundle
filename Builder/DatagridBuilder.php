<?php

namespace Bangpound\Twitter\DataBundle\Builder;

use Sonata\AdminBundle\Datagrid\Datagrid;
use Bangpound\Twitter\DataBundle\Datagrid\Pager;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridInterface;
use Sonata\DoctrineORMAdminBundle\Builder\DatagridBuilder as BaseDatagridBuilder;

class DatagridBuilder extends BaseDatagridBuilder
{

    /**
     * @param AdminInterface $admin
     * @param array $values
     *
     * @return DatagridInterface
     */
    public function getBaseDatagrid(AdminInterface $admin, array $values = array())
    {
        $pager = new Pager;
        $pager->setCountColumn($admin->getModelManager()->getIdentifierFieldNames($admin->getClass()));

        $formBuilder = $this->formFactory->createNamedBuilder('filter', 'form', array(), array('csrf_protection' => false));

        return new Datagrid($admin->createQuery(), $admin->getList(), $pager, $formBuilder, $values);
    }
}