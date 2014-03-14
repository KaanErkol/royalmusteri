<?php

namespace App\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use PHPExcel_Style_Fill;
use PHPExcel_Style_Border;
use PHPExcel_Style_Alignment;
class SiparisController extends Controller
{
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('AppCoreBundle:Siparis');
        $find = $repo->find($id);
        if(!$find){
            throw new NotFoundHttpException('Siparis Bulunamadı');
        }
        $creationDate = $find->getDate();
        $toplam = 0;
		$adettoplam = 0;
		$faturasizurunadettoplam= 0;
		$markaliurunadettoplam = 0;



        $creationDate = new \DateTime();

        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("liuggio")
            ->setLastModifiedBy("Giulio De Donato")
            ->setTitle("Office 2005 XLSX Test Document")
            ->setSubject("Office 2005 XLSX Test Document")
            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
            ->setKeywords("office 2005 openxml php")
            ->setCategory("Test result file");
        $widget = $phpExcelObject->setActiveSheetIndex(0);
        $widget->setCellValue('A2', 'Müşteri');
        $widget->setCellValue('B2', $find->getUser()->getIsim());
        $widget->setCellValue('F2', 'Tarih');
        $widget->setCellValue('H2', $creationDate->format('d-m-Y'));
        $phpExcelObject->getDefaultStyle()
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $widget->setCellValue('A4','Koli No');
        $widget->setCellValue('B4','Ürün Cinsi');
		$widget->setCellValue('D4','Firma');
        $widget->setCellValue('C4','Adet');
        $widget->setCellValue('E4','Faturasız Ürün Adeti');
		$widget->setCellValue('F4','Markalı Ürün Adeti');
        $widget->setCellValue('G4','Gönderi Yöntemi');
		$widget->setCellValue('H4','Ağırlık');
        $widget->setCellValue('I4','Toplam');

        $i=5;
        foreach($find->getUrunler() as $urun){
			if($urun->getGonderiyontemi() == 0){
				$gonyon='Uçak';
			}elseif($urun->getGonderiyontemi() == 1){
				$gonyon='Gemi Konteyner';
			}else{
				$gonyon = 'Gemi Parsiyel';
			}
		
            $widget->setCellValue('A'.$i,$urun->getKutuno());
            $widget->setCellValue('B'.$i,$urun->getUruncinsi());
			$widget->setCellValue('D'.$i,$urun->getFirma());
            $widget->setCellValue('C'.$i,$urun->getAdet());
            $widget->setCellValue('E'.$i,$urun->getFsizadet());
			$widget->setCellValue('F'.$i,$urun->getmarkaliurunadet());
            $widget->setCellValue('G'.$i,$gonyon);
			$widget->setCellValue('H'.$i,$urun->getAgirlik());
            $widget->setCellValue('I'.$i,$urun->getToplam());
            $toplam = $toplam+$urun->getToplam();
			$adettoplam = $adettoplam+$urun->getAdet();
			$faturasizurunadettoplam = $faturasizurunadettoplam+$urun->getFsizadet();
			$markaliurunadettoplam = $markaliurunadettoplam+$urun->getmarkaliurunadet();
            $i++;
        }
        $widget->setCellValue('H'.($i+1),'Toplam');
        $widget->setCellValue('I'.($i+1),$toplam);
		
		$widget->setCellValue('H'.($i+2),'Adet Toplam');
        $widget->setCellValue('I'.($i+2),$adettoplam);
		
		$widget->setCellValue('H'.($i+3),'Faturasız Toplam');
        $widget->setCellValue('I'.($i+3),$faturasizurunadettoplam);
		
		$widget->setCellValue('H'.($i+4),'Markalı Toplam');
        $widget->setCellValue('I'.($i+4),$markaliurunadettoplam);


        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $phpExcelObject->setActiveSheetIndex(0);
        $phpExcelObject->getActiveSheet()->getColumnDimension('A')->setWidth(13);
        $phpExcelObject->getActiveSheet()->getColumnDimension('B')->setWidth(45);
		$phpExcelObject->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $phpExcelObject->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $phpExcelObject->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $phpExcelObject->getActiveSheet()->getColumnDimension('F')->setWidth(17);
        $phpExcelObject->getActiveSheet()->getColumnDimension('G')->setWidth(13);
		$phpExcelObject->getActiveSheet()->getColumnDimension('I')->setWidth(17);
$phpExcelObject->getActiveSheet()->getColumnDimension('H')->setWidth(17);
        $phpExcelObject->getDefaultStyle()->applyFromArray(array(
            "borders" => array(
                "allborders" => array(
                    "style" => PHPExcel_Style_Border::BORDER_NONE
                )
            )
        ));

        foreach(range('A','H') as $columnID) {
            $phpExcelObject->getActiveSheet()->getStyle($columnID.'4')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'e8e8e8')
                    )
                )
            );
        }


        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');

        $creationDate = $find->getDate();
        $creationDate = new \DateTime();

        $response->headers->set('Content-Disposition', 'attachment;filename='.$find->getUser().'-'.$creationDate->format('d-m-Y').'.xls');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');

        return $response;

    }

    public function gosterAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('AppCoreBundle:Siparis');
        $find = $repo->find($id);
        if(!$find){
            throw new NotFoundHttpException('Siparis Bulunamadı');
        }
        $creationDate = $find->getDate();
        $toplam = 0;

        return $this->render('AppCoreBundle:Siparis:list.html.twig',array(
            'item' => $find,
        ));
    }
}
