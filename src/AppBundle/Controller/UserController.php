<?php
namespace AppBundle\Controller;

use AppBundle\Entity\AuthentificationTokens;
use AppBundle\Entity\Linker;
use AppBundle\Entity\User;
use AppBundle\Form\Type\AuthentificationTokensType;
use AppBundle\Form\Type\UserType;
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

        return $user[0];
    }

    private function queryUserByLoginAndPassword($authTokens)
    {
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
        $entityManager = $this->getEntityManager();
        $repository = $this->getEntityRepository('TakeAnInterest');
        $interests = $repository->findByUsers($request->get('idUser'));

        foreach ($interests as $key => $value) {
            $entityManager->remove($value);
        }

        $entityManager->flush();

        return $this->removeEntityAction("User", $request->get('idUser'));
    }

    /**
     * @Rest\View()
     * @Rest\Post("/users/university/")
     */
    public function addUserAUniversityAction(Request $request)
    {
        return $this->updateUserUniversities($request, "add");
    }

    /**
     * @Rest\View()
     * @Rest\Delete("/users/university/")
     */
    public function removeUserAUniversityAction(Request $request)
    {
        return $this->updateUserUniversities($request, "remove");
    }

    public function updateUserUniversities($request, $action)
    {
        $linker = $this->getLinker($request);

        if (!$linker instanceof Linker) {
            return $linker;
        }

        $user = $this->getOneInstanceOfOneEntityById("User", $linker->getId());
        $university = $this->getOneInstanceOfOneEntityById("University", $linker->getInversedId());

        if (empty($user) || empty($university)) {
            return $this->send404Error();
        }

        if ($action == "add") {
            $user->addUniversity($university);
        } else if ($action == "remove") {
            $user->removeUniversity($university);
        }

        $entityManager = $this->getEntityManager();
        $entityManager->merge($user);
        $entityManager->flush();

        return $user->getUniversities();
    }
}
