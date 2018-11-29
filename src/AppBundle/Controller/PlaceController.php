<?php
namespace AppBundle\Controller;

use AppBundle\Entity\MapPoints;
use AppBundle\Entity\Place;
use AppBundle\Form\Type\MapPointsType;
use AppBundle\Form\Type\PlaceType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaceController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/Places")
     */
    public function getPlacesAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("Place");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/Places/{idPlace}")
     */
    public function getPlaceAction(Request $request)
    {
        return $this->getEntityAction("Place", $request->get('idPlace'));
    }

    /**
     * @Rest\View()
     * @Rest\Post("/placesClosest")
     */
    public function postPlacesClosestAction(Request $request)
    {
        $map = new MapPoints();
        $form = $this->createForm(MapPointsType::class, $map);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $result = $this->closestPlacesQuery($map);

        return $this->closestTimedLocalization($result, $map->getReturnNumber());
    }

    private function closestPlacesQuery(MapPoints $map)
    {
        $latitude = ($map->getTop() + $map->getBottom()) / 2;
        $longitude = ($map->getLeft() + $map->getRight()) / 2;

        $formule = '((ACOS(SIN(:lat * PI() / 180) * SIN(i.latitude * PI() / 180) + COS(:lat * PI() / 180) * COS(i.latitude * PI() / 180) * COS((:lng - i.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515)';

        $entityManager = $this->getEntityManager();
        $dql = 'SELECT i';
        $dql .= ' FROM AppBundle\Entity\Place i';
        $dql .= ' JOIN i.great_deals g';
        $dql .= ' WHERE i.latitude < :top AND i.latitude > :bottom AND i.longitude < :right AND i.longitude > :left';
        $dql .= ' ORDER BY ' . $formule . ' ASC';

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

        foreach ($result[0]->getGreatDeals() as $greatDeal) {
            if (sizeof($greatDeal->getPeriods()) == 0) {
                if (!in_array($result[0], $returnArray)) {
                    array_push($returnArray, $result[0]);
                }
            }

            $periods = $greatDeal->getPeriods();
            $date = strtotime(date('Y-m-d h:i:s'));

            for ($i = 0; $i < sizeof($periods); $i++) {
                $startDate = $periods[$i]->getStartDate()->getTimestamp();
                $endDate = $periods[$i]->getEndDate()->getTimestamp();
                if ($startDate < $date && $endDate > $date) {
                    if (!in_array($result[0], $returnArray)) {
                        array_push($returnArray, $result[0]);
                    }
                }
            }
        }

        if (sizeof($returnArray) == $returnNumber) {
            return $returnArray;
        }

        return $returnArray;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/Places")
     */
    public function postPlaceAction(Request $request)
    {
        $Place = new Place();
        $form = $this->createForm(PlaceType::class, $Place);

        return $this->postEntityAction($Place, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/Places/{idPlace}")
     */
    public function patchPlaceAction(Request $request)
    {
        $Place = $this->getOneInstanceOfOneEntityById("Place", $request->get('idPlace'));
        $form = $this->createForm(PlaceType::class, $Place);

        return $this->patchEntityAction($Place, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/Places/{idPlace}")
     */
    public function removePlaceAction(Request $request)
    {
        return $this->removeEntityAction("Place", $request->get('idPlace'));
    }
}
