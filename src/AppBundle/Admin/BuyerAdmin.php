<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BuyerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Personal Data', array('class' => 'col-md-6'))
                ->add('firstName')
                ->add('lastName')
            ->end()
            ->with('Payments', array('class' => 'col-md-6'))
            ->add('payments', 'sonata_type_collection', array(
                'type_options' => array(
                'delete' => false,
                'delete_options' => array(
                'type'         => 'hidden',
                'type_options' => array(
                        'mapped'   => false,
                        'required' => false,
                        )
                    )
                ) 
            ),
            array(
                    'edit' => 'inline',
                    'inline' => 'table'
                ))
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
