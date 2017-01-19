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
       $formMapper->add('name');
       $formMapper->add('description');
       $formMapper->add('price');
   }

   protected function configureDatagridFilters(DatagridMapper $datagridMapper)
   {
       $datagridMapper->add('name');
       $datagridMapper->add('description');
       $datagridMapper->add('price');
   }

   protected function configureListFields(ListMapper $listMapper)
   {
       $listMapper->addIdentifier('name');
       $listMapper->add('description');
       $listMapper->add('price');
   }
}
