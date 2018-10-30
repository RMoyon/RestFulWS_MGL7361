<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Period;
use AppBundle\Form\Type\PeriodType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PeriodController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/periods")
     */
    public function getPeriodsAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("Period");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/periods/{idPeriod}")
     */
    public function getPeriodAction(Request $request)
    {
        return $this->getEntityAction("Period", $request->get('idPeriod'));
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/periods")
     */
    public function postPeriodAction(Request $request)
    {
        $period = new Period();
        $form = $this->createForm(PeriodType::class, $period);

        return $this->postEntityAction($period, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/periods/{idPeriod}")
     */
    public function patchPeriodAction(Request $request)
    {
        $period = $this->getOneInstanceOfOneEntityById("Period", $request->get('idPeriod'));
        $form = $this->createForm(PeriodType::class, $period);

        return $this->patchEntityAction($period, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/periods/{idPeriod}")
     */
    public function removePeriodAction(Request $request)
    {
        return $this->removeEntityAction("Period", $request->get('idPeriod'));
    }
}
