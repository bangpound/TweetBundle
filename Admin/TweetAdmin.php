<?php

namespace Bangpound\Twitter\DataBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Show\ShowMapper;

class TweetAdmin extends Admin
{
    protected $datagridValues = array(
        '_page'       => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'createdAt' // field name
    );

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('text')
            ->add('user')
            ->add('entities.hashtags')
            ->add('entities.media')
            ->add('entities.urls')
            ->add('entities.userMentions')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('text')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lang')
            ->add('createdAt')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('createdAt')
            ->add('user.screenName')
            ->addIdentifier('text')
            ->add('entities.hashtags')
            ->add('lang')
        ;
    }

    protected function configureSideMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit', 'show'))) { return; }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('Tweet', array('uri' => $admin->generateUrl('edit', array('id' => $id))));
        $menu->addChild('User', array('uri' => $admin->generateUrl('rshief_twitter.admin.user.list', array('id' => $id))));
        $menu->addChild('Place', array('uri' => $admin->generateUrl('rshief_twitter.admin.place.list', array('id' => $id))));
    }
}
