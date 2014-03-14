<?php
namespace App\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SiparisAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('user',null,array(
                'label' => 'Müşteri'
            ))
            ->add('date','date',array(
                'label' => 'Tarih'
            ))
            ->add('urunler','sonata_type_collection',
                array(
                    'required' => false,
                    'by_reference' => true,
                    'label' => 'Ürünler'
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'allow_delete' => true
                ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user',null,array('label'=>'Müşteri'))
            ->add('date',null,array('label'=>'Tarih'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('user',null,array('label'=>'Müşteri'))
            ->add('date',null,array('label'=>'Tarih'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array('template' => 'AppCoreBundle:Siparis:show.html.twig'),
                    'edit' => array(),
                )
            ))
        ;
    }


    public function getNewInstance()
    {
        $article = parent::getNewInstance();
        // provide a default date/time of now.
        $article->setDate( new \DateTime( 'now' ) );

        return $article;
    }

    public function prePersist($siparis)
    {
        foreach ($siparis->getUrunler() as $urunler) {
            $urunler->setParent($siparis);
        }
    }



    public function preUpdate($siparis)
    {
        foreach ($siparis->getUrunler() as $urunler) {
            $urunler->setParent($siparis);
        }
    }

    public function getParent()
    {
        return 'SonataAdminBundle';
    }

}