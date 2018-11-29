<?php
namespace AppBundle\Controller;

use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TakeAnInterestController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/interests")
     */
    public function getInterestsAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("TakeAnInterest");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/interests/{idInterest}")
     */
    public function getInterestAction(Request $request)
    {
        return $this->getEntityAction("Interest", $request->get('idInterest'));
    }

    /**
     * @Rest\View()
     * @Rest\Get("/interestsByUser/{idUser}")
     */
    public function getInterestByUserAction(Request $request)
    {
        return $this->getDoctrine()
            ->getRepository('AppBundle:TakeAnInterest')
            ->findByUsers($request->get('idUser'));
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/interests")
     */
    public function postInterestAction(Request $request)
    {
        $interest = new Interest();
        $form = $this->createForm(InterestType::class, $interest);

        return $this->postEntityAction($interest, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/interests/{idInterest}")
     */
    public function patchInterestAction(Request $request)
    {
        $interest = $this->getOneInstanceOfOneEntityById("TakeAnInterest", $request->get('idInterest'));
        $form = $this->createForm(InterestType::class, $interest);

        return $this->patchEntityAction($interest, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/interests/{idInterest}")
     */
    public function removeInterestAction(Request $request)
    {
        return $this->removeEntityAction("TakeAnInterest", $request->get('idInterest'));
    }
}
