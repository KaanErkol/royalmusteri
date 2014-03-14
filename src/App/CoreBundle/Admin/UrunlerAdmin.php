<?php
namespace App\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UrunlerAdmin extends Admin
{
// Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('kutuno','text',array(
                'attr' => array('style' => 'width:100px', 'customattr' => 'customdata'),
                'label' => 'Koli No'
            ))
            ->add('uruncinsi','textarea',array(
                'attr' => array('style' => 'width:200px', 'customattr' => 'customdata'),
                'label' => 'Ürün Cinsi'
            ))
            ->add('adet',null,array(
                'label' => 'Adet',
                'attr' => array('style' => 'width:40px;'),
            ))
            ->add('firma',null,array(
                'label' => 'Firma',
                'attr' => array('style' => 'width:140px'),
            ))
            ->add('fsizadet',null,array(
                'label' => 'Faturasız Ürün Adeti',
                'attr' => array('style' => 'width:130px'),
            ))
            ->add('markaliurunadet',null,array(
                'label' => 'Markalı Ürün Adeti',
                'attr' => array('style' => 'width:130px'),
            ))
            ->add('Gonderiyontemi','choice',array(
                'label' => 'Gönderi Yöntemi',
                'attr' => array('style' => 'width:150px'),
                'choices'   => array('Uçak','Gemi Konteyner','Gemi Parsiyel'),
            ))
			->add('agirlik',null,array(
                'label' => 'Ağırlık',
                'attr' => array('style' => 'width:50px'),
            ))
            ->add('toplam',null,array(
                'label' => 'Toplam',
                'attr' => array('style' => 'width:100px;'),
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('kutuno',null,array('label'=>'Kutu No'))
            ->add('uruncinsi',null,array('label'=>'Ürün Cinsi'))
            ->add('adet',null,array('label'=>'Adet'))
            ->add('firma',null,array('label'=>'firma'))
            ->add('toplam',null,array('label'=>'Toplam'))
            ->add('agirlik')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('kutuno')
            ->add('uruncinsi')
            ->add('adet')
            ->add('toplam')
            ->add('agirlik')
        ;
    }
}