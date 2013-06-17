<?php

namespace Bangpound\Twitter\DataBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

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
            ->add('createdAt')
            ->add('user', null, array('template' => 'BangpoundTwitterDataBundle:CRUD:show_tweet_user.html.twig'))
            ->add('hashtags')
            ->add('source', null, array('safe' => true))
            ->add('media', null, array('template' => 'BangpoundTwitterDataBundle:CRUD:show_tweet_media.html.twig'))
            ->add('urls', null, array('template' => 'BangpoundTwitterDataBundle:CRUD:show_tweet_urls.html.twig'))
            ->add('userMentions')
            ->with('Geo')
                ->add('place')
                ->add('coordinates')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('text')
            ->add('place', 'doctrine_orm_boolean', array('field_type' => 'checkbox', 'required' => false))
            ->add('user.verified')
            ->add('lang')
            ->add('createdAt')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('createdAt')
            ->add('user')
            ->addIdentifier('text', null, array('route' => array('name' => 'show')))
            ->add('lang')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('edit')
            ->remove('create')
            ->remove('history')
        ;
    }

    public function getTemplate($name)
    {
        switch ($name) {
            case 'show':
                return 'BangpoundTwitterDataBundle:CRUD:show_tweet.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }
}
