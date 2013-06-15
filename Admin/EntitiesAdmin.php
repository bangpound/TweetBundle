<?php

namespace Bangpound\TweetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class EntitiesAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
        ;
    }

    protected function configureSideMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit', 'show'))) { return; }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('Entities', array('uri' => $admin->generateUrl('edit', array('id' => $id))));
        $menu->addChild('Hashtag', array('uri' => $admin->generateUrl('rshief_twitter.admin.hashtag.list', array('id' => $id))));
        $menu->addChild('Media', array('uri' => $admin->generateUrl('rshief_twitter.admin.media.list', array('id' => $id))));
        $menu->addChild('Url', array('uri' => $admin->generateUrl('rshief_twitter.admin.url.list', array('id' => $id))));
        $menu->addChild('UserMention', array('uri' => $admin->generateUrl('rshief_twitter.admin.user_mention.list', array('id' => $id))));
    }
}
