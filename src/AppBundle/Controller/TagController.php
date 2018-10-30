<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Tag;
use AppBundle\Form\Type\TagType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TagController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/tags")
     */
    public function getTagsAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("Tag");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/tags/{idTag}")
     */
    public function getTagAction(Request $request)
    {
        return $this->getEntityAction("Tag", $request->get('idTag'));
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/tags")
     */
    public function postTagAction(Request $request)
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);

        return $this->postEntityAction($tag, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/tags/{idTag}")
     */
    public function patchTagAction(Request $request)
    {
        $tag = $this->getOneInstanceOfOneEntityById("Tag", $request->get('idTag'));
        $form = $this->createForm(TagType::class, $tag);

        return $this->patchEntityAction($tag, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/tags/{idTag}")
     */
    public function removeTagAction(Request $request)
    {
        return $this->removeEntityAction("Tag", $request->get('idTag'));
    }
}
