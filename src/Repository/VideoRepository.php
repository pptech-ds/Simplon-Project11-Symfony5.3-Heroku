<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }


    public function insertVideo($name, $slug, $url, $image)
    {
        
        $em = $this->getDoctrine()->getManager();

        $video = new Video;
        $video->setName($name);
        $em->persist($name);
        $video->setName($slug);
        $em->persist($slug);
        $video->setName($url);
        $em->persist($url);
        $video->setName($image);
        $em->persist($image);
        $em->flush();        

    }

    // /**
    //  * @return Video[] Returns an array of Video objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Video
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
