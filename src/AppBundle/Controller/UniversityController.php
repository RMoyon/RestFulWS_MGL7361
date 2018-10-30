<?php
namespace AppBundle\Controller;

use AppBundle\Entity\University;
use AppBundle\Form\Type\UniversityType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UniversityController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/universities")
     */
    public function getUniversitiesAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("University");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/universities/{idUniversity}")
     */
    public function getUniversityAction(Request $request)
    {
        return $this->getEntityAction("University", $request->get('idUniversity'));
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/universities")
     */
    public function postUniversityAction(Request $request)
    {
        $university = new University();
        $form = $this->createForm(UniversityType::class, $university);

        return $this->postEntityAction($university, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/universities/{idUniversity}")
     */
    public function patchUniversityAction(Request $request)
    {
        $university = $this->getOneInstanceOfOneEntityById("University", $request->get('idUniversity'));
        $form = $this->createForm(UniversityType::class, $university);

        return $this->patchEntityAction($university, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/universities/{idUniversity}")
     */
    public function removeUniversityAction(Request $request)
    {
        return $this->removeEntityAction("University", $request->get('idUniversity'));
    }
}
