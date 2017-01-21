<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ShopAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Details', array('class' => 'col-md-6'))
                ->add('name')
                ->add('rating')
            ->end()
            ->with('Gifts', array('class' => 'col-md-6'))
                ->add('gifts', 'sonata_type_model', 
                    array('by_reference' => false, 'expanded' => true, 'multiple' => true, 'label' => 'Gifts'), array('admin_code' => 'admin.gift'))            
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('rating');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('rating');
    }
}
