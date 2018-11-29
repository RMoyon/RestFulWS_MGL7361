<?php
namespace AppBundle\Controller;

use AppBundle\Entity\GreatDeal;
use AppBundle\Entity\UserPoint;
use AppBundle\Form\Type\GreatDealType;
use AppBundle\Form\Type\UserPointType;
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
    public function postGreatDealsClosestAction(Request $request)
    {
        $userPoint = new UserPoint();
        $form = $this->createForm(UserPointType::class, $userPoint);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $result = $this->closestGreatDealsQuery($userPoint);

        return $this->closestTimedGreatDeals($result, $userPoint->getReturnNumber());
    }

    private function closestGreatDealsQuery(UserPoint $point)
    {
        $formule = '((ACOS(SIN(:lat * PI() / 180) * SIN(i.latitude * PI() / 180) + COS(:lat * PI() / 180) * COS(i.latitude * PI() / 180) * COS((:lng - i.longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515)';

        $entityManager = $this->getEntityManager();
        $dql = 'SELECT g';
        $dql .= ' FROM AppBundle\Entity\GreatDeal g';
        $dql .= ' JOIN g.places i';
        $dql .= ' ORDER BY ' . $formule . ' ASC';

        $query = $entityManager->createQuery($dql)
            ->setParameter('lat', $point->getLatitude())
            ->setParameter('lng', $point->getLongitude());

        return $query->execute();
    }

    private function closestTimedGreatDeals($greatDeal, string $returnNumber)
    {
        $returnArray = array();
        for ($i = 0; $i < sizeof($greatDeal); $i++) {
            if (sizeof($greatDeal[$i]->getPeriods()) == 0) {
                if (!in_array($greatDeal[$i], $returnArray)) {
                    array_push($returnArray, $greatDeal[$i]);
                }
            }

            $periods = $greatDeal[$i]->getPeriods();
            $date = strtotime(date('Y-m-d h:i:s'));

            for ($y = 0; $y < sizeof($periods); $y++) {
                $startDate = $periods[$y]->getStartDate()->getTimestamp();
                $endDate = $periods[$y]->getEndDate()->getTimestamp();
                if ($startDate < $date && $endDate > $date) {
                    if (!in_array($greatDeal[$i], $returnArray)) {
                        array_push($returnArray, $greatDeal[$i]);
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
