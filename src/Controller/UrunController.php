<?php

namespace App\Controller;

use App\Entity\Date as EntityDate;
use App\Entity\UrunBilgileri;
use App\Repository\UrunBilgileriRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Date;

class UrunController extends AbstractController
{
    
    /**
     * @Route("/product/post", name = "postproduct")
     */
    public function postUrun(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $urun = new UrunBilgileri();
        $urun ->setUrunAdi("Dryer Machine")
            ->setUrunAciklamasi(" Clothes Dryer is a standalone machine that dries wet clothes completely.")
            ->setUrunAdedi(8)
            ->setUrunFiyati(12000)
            ->setUrunKayitTarihi(new \DateTime());
        $em->persist($urun);
        $em->flush();
        
        return $this->json([
            'Success'
        ]);}

    /**
     * @Route("/product/get", name = "getAll")
     */
    public function getAll(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $urun = $doctrine->getRepository(UrunBilgileri::class)->findAll();

        print $this->json(
           $urun);

        return $this->json(
            'Success');
    } 

      /**
     * @Route("/product/{id}", name = "showInfo")
     */
    public function getUrun(ManagerRegistry $doctrine, int $id): Response
    {
        $urun = $doctrine->getRepository(UrunBilgileri::class)->findOneBy(['id'=>$id]);
        if (!$urun){
            throw $this->createNotFoundException('Unavailable id'.$id);
        }  
        return $this->json(
             $urun );
    } 

    /**
     * @Route("/product/update/{id}", name = "updateProduct")
     */
    public function updateUrun(ManagerRegistry $doctrine, int $id): Response
    {
        $urun = $doctrine->getRepository(UrunBilgileri::class)->find($id);
        if (!$urun){
            throw $this->createNotFoundException('Unavailable id'.$id);
        }
        $urun->setUrunAdi("Basari ile degistirildi");
        $doctrine->getManager()->flush();
        return $this->json(
             'Name changed Successfully' );
    } 

     /**
     * @Route("/product/delete/{id}", name = "deleteProduct")
     */
   public function deleteUrun(ManagerRegistry $doctrine, UrunBilgileri $urun,$id): Response
    {
        $repository = $doctrine->getRepository(UrunBilgileri::class)->findOneBy(['id'=>$id]);
        $entityManager = $doctrine->getManager();
        if (!$repository){
            throw $this->createNotFoundException('Unavailable id'.$id);
        }
        $entityManager->remove($urun);
        $entityManager->flush();
        return $this->json(
             'Deleted Successfully' );
    } 
}

