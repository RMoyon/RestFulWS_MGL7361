<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;
use AppBundle\Entity\AuthentificationTokens;
use AppBundle\Form\Type\AuthentificationTokensType;
use AppBundle\SymfonyAbstract\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/users")
     */
    public function getUsersAction(Request $request)
    {
        return $this->getAllInstancesOfOneEntity("User");
    }

    /**
     * @Rest\View()
     * @Rest\Get("/users/{idUser}")
     */
    public function getUserAction(Request $request)
    {
        return $this->getEntityAction("User", $request->get('idUser'));
    }

    /**
     * @Rest\View()
     * @Rest\Post("/users/auth")
     */
    public function postAuthAction(Request $request)
    {
        $authTokens = new AuthentificationTokens();
        $form = $this->createForm(AuthentificationTokensType::class, $authTokens);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $user = $this->queryUserByLoginAndPassword($authTokens);

        if (empty($user)) {
            return $this->send404Error();
        }

        return $user;
    }

    private function queryUserByLoginAndPassword($authTokens){
        $entityManager = $this->getEntityManager();

        $dql = 'SELECT u FROM AppBundle\Entity\User u WHERE u.login = :login AND u.password = :password';

        $query = $entityManager->createQuery($dql)
            ->setParameter('login', $authTokens->getLogin())
            ->setParameter('password', $authTokens->getPassword());

        return $query->execute();
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/users")
     */
    public function postUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        return $this->postEntityAction($user, $form, $request);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/users/{idUser}")
     */
    public function patchUserAction(Request $request)
    {
        $user = $this->getOneInstanceOfOneEntityById("User", $request->get('idUser'));
        $form = $this->createForm(UserType::class, $user);

        return $this->patchEntityAction($user, $form, $request);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/users/{idUser}")
     */
    public function removeUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppBundle:TakeAnInterest');
        $interests = $repository->findByUsers($request->get('idUser'));
        foreach ($interests as $key => $value) {
          $em->remove($value);
        }
        $em->flush();
        return $this->removeEntityAction("User", $request->get('idUser'));
    }
}
