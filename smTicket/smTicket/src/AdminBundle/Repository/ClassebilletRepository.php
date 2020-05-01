<?php

namespace AdminBundle\Repository;

/**
 * ClassebilletRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClassebilletRepository extends \Doctrine\ORM\EntityRepository
{
    public function countAllClasseBillets() {

        $qb = $this->createQueryBuilder("cb");
        $qb->select("COUNT(cb)");
        return $qb->getQuery()->getSingleScalarResult();

    }

    public function nbreMinTarifById($id) {

        $qb = $this->createQueryBuilder("cb");
        $qb->select("Min(cb.tarif)");
        $qb->where("cb.evenement = :id");
        $qb->setParameter("id",$id);
        return $qb->getQuery()->getSingleScalarResult();



    }


    public function nbreMinTarif() {

        $qb = $this->createQueryBuilder("cb");
        $qb->select("Min(cb.tarif)");


        return $qb->getQuery()->getSingleScalarResult();
    }


    public function NombreTarifMin() {

        $qb = $this->createQueryBuilder("cb");
        $qb->select("Min(cb.tarif)");
        $qb->leftJoin("cb.evenement", "evenement");


        return $qb->getQuery()->getSingleScalarResult();

    }



    public function findArray($array) {
        $qb=$this->createQueryBuilder('b')
                ->select('b')
                ->where('b.id in (:array)')
                 ->setParameter('array',$array);
        return $qb->getQuery()->getResult();

            }

    public function getClassebilletbyevent($evenement) {
        $qb = $this->createQueryBuilder("cb");
        $qb->leftJoin("cb.evenement", "evenement");
        $qb->Where("evenement = :evenementId");
        $qb->setParameter("evenementId", $evenement);

        return $qb->getQuery();}


}
