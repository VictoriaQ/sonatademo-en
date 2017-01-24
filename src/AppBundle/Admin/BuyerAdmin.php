<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

class BuyerAdmin extends AbstractAdmin
{
    protected function configureSideMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit'))) {
            return;
        }
        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');
        $menu->addChild(
            'Buyer',
            $admin->generateMenuUrl('edit', array('id' => $id))
        ); 
        $menu->addChild(
            'Payments',
            $admin->generateMenuUrl('admin.buyer|admin.payment.list', array('id' => $id))
        );
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Personal Data', array('class' => 'col-md-6'))
                ->add('firstName')
                ->add('lastName')
            ->end()
            ->with('Billing Address', array('class' => 'col-md-6'))
                ->add('address')
                ->add('city')
                ->add('zipcode')
                ->add('country')
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

    public function prePersist($payment)
    {
        if ($this->getParent()) {
            $payment->setBuyer($this->getParent()->getSubject());
        }
    }

    public function preUpdate($payment)
    {
        if ($this->getParent()) {
            $payment->setBuyer($this->getParent()->getSubject());
        }
    }

}
