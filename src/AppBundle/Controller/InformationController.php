<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Information;
use AppBundle\Entity\MapPoints;
use AppBundle\Form\Type\InformationType;
use AppBundle\Form\Type\MapPointsType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InformationController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/informations")
     */
    public function getInformationsAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("Information");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/informations/{idInformation}")
     */
    public function getInformationAction(Request $request)
    {
        return $this->getEntityAction("Information", $request->get('idInformation'));
    }

    /**
      * @Rest\View()
      * @Rest\Post("/informationsClosest")
      */
    public function postInformationsClosestAction(Request $request) {
      $map = new MapPoints();
      $form = $this->createForm(MapPointsType::class, $map);

      $form->submit($request->request->all());

      if (!$form->isValid()) {
          return $form;
      }

      // return $this->closestInformationsQuery($map);

      $result = $this->closestInformationsQuery($map);

      return $this->closestTimedLocalization($result, $map->getReturnNumber());
    }

    private function closestInformationsQuery(MapPoints $map)
    {
      $latitude = ($map->getTop() + $map->getBottom())/2;
      $longitude = ($map->getLeft() + $map->getRight())/2;

      $formule = '((ACOS(SIN(:lat * PI() / 180) * SIN(i.latitude * PI() / 180) + COS(:lat * PI() / 180) * COS(i.latitude * PI() / 180) * COS((:lng - i.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance';

      $entityManager = $this->getEntityManager();
      $dql  = 'SELECT i, g, '.$formule;
      $dql .= ' FROM AppBundle\Entity\Information i';
      $dql .= ' JOIN i.great_deals g';
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

    private function closestTimedLocalization($result, string $returnNumber)
    {
      $result;
      $returnArray = array();
      foreach ($result as $information) {
        foreach ($information[0]->getGreatDeals() as $greatDeal) {
          if (sizeof($greatDeal->getPeriods()) == 0) {
            array_push($returnArray, $information);
          }

          $periods = $greatDeal->getPeriods();
          $date = strtotime(date('Y-m-d h:i:s'));

          for ($i=0; $i < sizeof($periods); $i++) {
            $startDate = $periods[$i]->getStartDate()->getTimestamp();
            $endDate = $periods[$i]->getEndDate()->getTimestamp();
            if ($startDate < $date && $endDate > $date) {
              array_push($returnArray, $information);
            }
          }
        }

        if (sizeof($returnArray) == $returnNumber) {
          return $returnArray;
        }
      }

      return $returnArray;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/informations")
     */
    public function postInformationAction(Request $request)
    {
        $information = new Information();
        $form = $this->createForm(InformationType::class, $information);

        return $this->postEntityAction($information, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/informations/{idInformation}")
     */
    public function patchInformationAction(Request $request)
    {
        $information = $this->getOneInstanceOfOneEntityById("Information", $request->get('idInformation'));
        $form = $this->createForm(InformationType::class, $information);

        return $this->patchEntityAction($information, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/informations/{idInformation}")
     */
    public function removeinformationAction(Request $request)
    {
        return $this->removeEntityAction("Information", $request->get('idInformation'));
    }
}
