<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Information;
use AppBundle\Form\Type\InformationType;
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
