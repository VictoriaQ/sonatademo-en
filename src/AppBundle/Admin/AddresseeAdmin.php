<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AddresseeAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Personal Data', array('class' => 'col-md-6'))
                ->add('firstName')
                ->add('lastName')
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstName');
        $datagridMapper->add('lastName');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('firstName');
        $listMapper->addIdentifier('lastName');
    }
}
