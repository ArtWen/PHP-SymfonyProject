<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Wygenerowane poprzez komendę php bin/console make:entity Project
 * funkcje dodane ręcznie przez Artur Wenda
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * @return Project[] Returns an array of Project objects
     * stworzone przez Artur Wenda
     */
    public function findBySearchQuery($query)
    {
        $result = [];

        $exactQueryBuilder = $this->createQueryBuilder('p')
            ->andWhere('p.title LIKE :query OR p.summary LIKE :query')
            ->setParameter('query', '%'.$query.'%')
        ;
        $result = array_merge($result, $exactQueryBuilder->orderBy('p.date', 'DESC')
            ->getQuery()
            ->getResult()
        );
        $words = $this->splitQuery($query);

        $wordQueryBuilder = $this->createQueryBuilder('p');
        foreach ($words as $word){
            $wordQueryBuilder->orWhere('p.title LIKE :word_'.$word.' OR p.summary LIKE :word_'.$word)
                ->setParameter('word_'.$word, '%'.$word.'%');
        }
        $result = array_unique(array_merge($result, $wordQueryBuilder->orderBy('p.date', 'DESC')
            ->getQuery()
            ->getResult()));
        return $result;
    }

    /**
     * @return string[] Returns an array of search query words
     * stworzone przez Artur Wenda
     */
    public function splitQuery($query){
        return $result = array_unique(
          explode(" ",$query)
        );
    }

    /*
    public function findOneBySomeField($value): ?Project
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
