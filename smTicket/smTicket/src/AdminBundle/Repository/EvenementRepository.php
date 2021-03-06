<?php

namespace AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvenementRepository extends EntityRepository
{
    public function getevenementsbyuser($user) {
        $qb = $this->createQueryBuilder("e");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);

    return $qb->getQuery()->getResult();}
    
    
      public function chercherEvenement($Keyword, $categorie, $ville, $lieu) {
        $qb = $this->createQueryBuilder("e");


        if($Keyword != "all")
        {
            $qb->andWhere('e.titreEvenement LIKE :Keyword');
            $qb->andWhere('e.ville Like :Keyword');
            $qb->setParameter('Keyword', '%' . $Keyword . '%');
        }

          if($ville != "all")
          {
              $qb->andWhere("e.ville = :ville");
              $qb->setParameter("ville", $ville);
          }

          if($lieu != "all")
          {
              $qb->andWhere("e.lieuEvenement = :lieuEvenement");
              $qb->setParameter("lieuEvenement", $lieu);
          }


        if($categorie != "all") {

            $qb->leftJoin("e.categorie", "categorie");
            $qb->andWhere("categorie.libelleCategorie = :categorieId");


            $qb->setParameter("categorieId", $categorie);
        }
          $qb->andWhere("e.status ='1'");
          $qb->orderBy('e.dateFinEvenement', 'DESC');

        return $qb->getQuery();
    }



    public function findbest()
    {
        $query = $this->getEntityManager()->createQuery("SELECT v FROM AdminBundle:Evenement  v WHERE v.status='1' ORDER BY v.vues DESC ");
        return $query->getResult();
    }


    public function findAllorder()
    {
        $query = $this->getEntityManager()->createQuery("SELECT e FROM AdminBundle:Evenement  e  ORDER BY e.dateCreationEvenement DESC ");
        return $query->getResult();
    }

    #récupération de la liste des evenements active pour newsletter
    public function findAllEvenementActive()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT n
             FROM AdminBundle:Evenement  n WHERE n.status='1' ORDER BY n.dateFinEvenement DESC ")
            ->getResult();
    }
    //AND  CURRENT_DATE() <= n.dateFinEvenement



    #récupération de la liste des evenements active
        public function findAllEvenementValide()
        {
            return $this->getEntityManager()
                ->createQuery("SELECT n
             FROM AdminBundle:Evenement  n WHERE n.status='1' ORDER BY n.dateFinEvenement DESC")
                ->getResult();
        }




    public function findNbreEventByDataActive($date1, $date2)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT count(n.titreEvenement)
             FROM AdminBundle:Evenement  n WHERE n.dateDebutEvenement BETWEEN ".$date1." and ".$date2)
            ->getResult();

    }

    public function countAllEvents() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsByMusique() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Musique'");

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsMusiqueByuser($user) {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Musique'");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsByCinema() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Cinéma'");


        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsCinemaByuser($user) {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Cinéma'");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);

        return $qb->getQuery()->getSingleScalarResult();

    }
    public function countEventsByTheatre() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Théâtre'");

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsTheatreByuser($user) {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Théâtre'");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsByFestivals() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Féstivals'");

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsFestivalsByUser($user) {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Féstivals'");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);
        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsBySport() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Sport'");

        return $qb->getQuery()->getSingleScalarResult();

    }


    public function countEventsSportByUser($user) {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Sport'");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsByConcert() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Concert'");

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function countEventsConcertByUser($user) {

        $qb = $this->createQueryBuilder("e");
        $qb->select("COUNT(e)");
        $qb->leftJoin("e.categorie", "categorie");
        $qb->where("categorie.libelleCategorie = 'Concert'");
        $qb->andwhere("e.user = :user");
        $qb->setParameter("user", $user);

        return $qb->getQuery()->getSingleScalarResult();

    }

    public function FindEventVille() {
        $qb = $this->createQueryBuilder("e");
        $qb->select('e.ville');
        $qb->where("e.status = '1'");
        $qb->distinct();

        return $qb->getQuery()->getResult();
    }

    public function FindEventLieux() {
        $qb = $this->createQueryBuilder("e");
        $qb->select('e.lieuEvenement');
        $qb->where("e.status = '1'");
        $qb->distinct();

        return $qb->getQuery()->getResult();
    }

    public function NombreMinTarif() {

        $qb = $this->createQueryBuilder("e");
        $qb->select("Min(e.tarif)");
        $qb->leftJoin("e.Classebillets", "Classebillets");


        return $qb->getQuery()->getSingleScalarResult();

    }


}

