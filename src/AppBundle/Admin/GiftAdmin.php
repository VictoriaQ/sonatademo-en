<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class GiftAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('sendEmail', $this->getRouterIdParameter().'/send-email');
    }

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
        $datagridMapper->add('addressee', null, array('class' => 'AppBundle\Entity\Addressee', 'choice_label' => 'fullName'));
        $datagridMapper->add('buyer', null, array('class' => 'AppBundle\Entity\Buyer', 'choice_label' => 'fullName'));
        $datagridMapper->add('myFilter', 'doctrine_orm_callback',
            array(
                'callback' => function($queryBuilder, $alias, $field, $value) {
                        if (!$value['value']) {
                                return;
                            }
                
                            $queryBuilder->andWhere($alias.'.status != :status');
                            $queryBuilder->setParameter('status', 'DELIVERED');
                
                                return true;
                        },
                                'field_type' => 'checkbox',
                                'label' => 'Not delivered'
                        ))   
                        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->add('price', 'currency', array('currency' => 'USD'));
        $listMapper->add('description', null, array('label' => 'Details'));
        $listMapper->add('addressee', null, array('editable' => true));
        $listMapper->add('buyer');
        $listMapper->add('status', 'string', array('template' => ':Admin:field_status.html.twig'));
        $listMapper->add('myField', 'string', array('template' => ':Admin:field_send_email.html.twig'));
    }

    //public function createQuery($context = 'list')
    //{
    //    $query = parent::createQuery($context);
    //    $rootAlias = $query->getRootAliases()[0];
    //    $query
    //        ->andWhere(
    //            $query->expr()->eq($rootAlias.'.delivered', ':wasDelivered'));

    //    $query->setParameter('wasDelivered', false);

    //    return $query;
    //}

}
