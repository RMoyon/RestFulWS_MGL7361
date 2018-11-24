<?php
namespace AppBundle\Controller;

use AppBundle\Entity\GreatDeal;
use AppBundle\Entity\MapPoints;
use AppBundle\Form\Type\GreatDealType;
use AppBundle\Form\Type\MapPointsType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GreatDealController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/greatdeals")
     */
    public function getGreatDealsAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("GreatDeal");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/greatdeals/{idGreatDeal}")
     */
    public function getGreatDealAction(Request $request)
    {
        return $this->getEntityAction("GreatDeal", $request->get('idGreatDeal'));
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/greatdeals")
     */
    public function postGreatDealAction(Request $request)
    {
        $greatDeal = new GreatDeal();
        $form = $this->createForm(GreatDealType::class, $greatDeal);

        return $this->postEntityAction($greatDeal, $form, $request);
    }

    /**
      * @Rest\View()
      * @Rest\Post("/greatDealsClosest")
      */
    public function postGreatDealsClosestAction(Request $request) {
      $map = new MapPoints();
      $form = $this->createForm(MapPointsType::class, $map);

      $form->submit($request->request->all());

      if (!$form->isValid()) {
          return $form;
      }

      // return $this->closestGreatDealsQuery($map);;

      $result = $this->closestGreatDealsQuery($map);

      return $this->closestTimedGreatDeals($result, $map->getReturnNumber());
    }

    private function closestGreatDealsQuery(MapPoints $map)
    {
      $latitude = ($map->getTop() + $map->getBottom())/2;
      $longitude = ($map->getLeft() + $map->getRight())/2;

      $formule = '((ACOS(SIN(:lat * PI() / 180) * SIN(i.latitude * PI() / 180) + COS(:lat * PI() / 180) * COS(i.latitude * PI() / 180) * COS((:lng - i.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance';

      $entityManager = $this->getEntityManager();
      $dql  = 'SELECT g, '.$formule;
      $dql .= ' FROM AppBundle\Entity\GreatDeal g';
      $dql .= ' JOIN g.informations i';
      $dql .= ' WHERE i.latitude < :top AND i.latitude > :bottom AND i.longitude < :right AND i.longitude > :left';
      $dql .= ' ORDER BY distance ASC';

      $query = $entityManager->createQuery($dql)
        ->setParameter('lat', $latitude)
        ->setParameter('lng', $longitude)
        ->setParameter('top', $map->getTop())
        ->setParameter('bottom', $map->getBottom())
        ->setParameter('left', $map->getLeft())
        ->setParameter('right', $map->getRight());

      return $query->execute();
    }

    private function closestTimedGreatDeals($result, string $returnNumber)
    {
      $result;
      $returnArray = array();
      foreach ($result as $greatDeal) {
        if (sizeof($greatDeal[0]->getPeriods()) == 0) {
          array_push($returnArray, $greatDeal);
        }

        $periods = $greatDeal[0]->getPeriods();
        $date = strtotime(date('Y-m-d h:i:s'));

        for ($i=0; $i < sizeof($periods); $i++) {
          $startDate = $periods[$i]->getStartDate()->getTimestamp();
          $endDate = $periods[$i]->getEndDate()->getTimestamp();
          if ($startDate < $date && $endDate > $date) {
            array_push($returnArray, $greatDeal);
          }
        }

        if (sizeof($returnArray) == $returnNumber) {
          return $returnArray;
        }
      }

      return $returnArray;
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/greatdeals/{idGreatDeal}")
     */
    public function patchGreatDealAction(Request $request)
    {
        $greatDeal = $this->getOneInstanceOfOneEntityById("GreatDeal", $request->get('idGreatDeal'));
        $form = $this->createForm(GreatDealType::class, $greatDeal);

        return $this->patchEntityAction($greatDeal, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/greatdeals/{idGreatDeal}")
     */
    public function removeGreatDealAction(Request $request)
    {
        return $this->removeEntityAction("GreatDeal", $request->get('idGreatDeal'));
    }
}
