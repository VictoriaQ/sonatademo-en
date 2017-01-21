<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GiftAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Gift', array('class' => 'col-md-6'))
                ->add('name')
                ->add('price')
                ->add('description')
            ->end()
            ->with('Participants', array('class' => 'col-md-6'))
                ->add('addressee', null, array('class' => 'AppBundle\Entity\Addressee', 'choice_label' => 'fullName'))
                ->add('buyer', null, array('class' => 'AppBundle\Entity\Buyer', 'choice_label' => 'fullName'))
            ->end()
            ->with('Shops', array('class' => 'col-md-6'))
                ->add('shops', 'sonata_type_model', 
                    array('by_reference' => false, 'expanded' => true, 'multiple' => true, 'label' => 'Shops'), array('admin_code' => 'admin.shop')) 
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('price');
        $datagridMapper->add('addressee');
        $datagridMapper->add('buyer');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->add('price', 'currency', array('currency' => 'USD'));
        $listMapper->add('description', null, array('label' => 'Details'));
        $listMapper->add('addressee', null, array('editable' => true));
        $listMapper->add('buyer');
        $listMapper->add('_action', null, array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ))
        ;
    }
}
