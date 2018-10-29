<?php
namespace AppBundle\Controller;

use AppBundle\Entity\GreatDeal;
use AppBundle\Form\Type\GreatDealType;
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
    public function postUserAction(Request $request)
    {
        $greatDeal = new GreatDeal();
        $form = $this->createForm(GreatDealType::class, $greatDeal);

        return $this->postEntityAction($greatDeal, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/greatdeals/{idGreatDeal}")
     */
    public function patchUserAction(Request $request)
    {
        $greatDeal = $this->getOneInstanceOfOneEntityById("GreatDeal", $request->get('idGreatDeal'));
        $form = $this->createForm(GreatDealType::class, $greatDeal);

        return $this->patchEntityAction($greatDeal, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/greatdeals/{idGreatDeal}")
     */
    public function removeUserAction(Request $request)
    {
        return $this->removeEntityAction("GreatDeal", $request->get('idGreatDeal'));
    }
}
