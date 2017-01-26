<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class UserConfigurationAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'config';
    protected $baseRoutePattern = 'config';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('myEdit', 'my-edit');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('config1')
            ->add('config2')
            ->add('config3')
            ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('config1')
            ->add('config2')
            ->add('config3')
            ;
    }
}
