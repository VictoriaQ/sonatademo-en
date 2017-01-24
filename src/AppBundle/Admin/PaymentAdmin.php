<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PaymentAdmin extends AbstractAdmin
{
    public function configure()
    {
        $this->parentAssociationMapping = 'buyer';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('amount')
            ->add('paid')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('amount')
            ->add('paid')
            ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('amount')
            ->add('paid')
            ;
    }

    //This code below could be used instead of using 'parentAssociationMapping'
    //
    //public function preUpdate($payment)
    //{
    //    if ($this->getParent()) {
    //        $payment->setBuyer($this->getParent()->getSubject());
    //    }
    //}

    //public function prePersist($payment)
    //{
    //    if ($this->getParent()) {
    //        $payment->setBuyer($this->getParent()->getSubject());
    //    }
    //}

    //public function createQuery($context = 'list')
    //{
    //    $query = parent::createQuery($context);
    //    $rootAlias = $query->getRootAliases()[0];
    //    $query
    //        ->andWhere(
    //            $query->expr()->eq($rootAlias.'.buyer', ':buyer'));

    //    $query->setParameter('buyer', $this->getParent()->getSubject());

    //    return $query;
    //}
}
