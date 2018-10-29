<?php
namespace AppBundle\SymfonyAbstract;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AbstractController extends Controller
{
    public function getEntityManager()
    {
        return $this->get('doctrine.orm.entity_manager');
    }

    public function getEntityRepository($entityType)
    {
        return $this->getEntityManager()->getRepository('AppBundle:' . $entityType);
    }

    public function getAllInstancesOfOneEntity($entityType)
    {
        return $this->getEntityRepository($entityType)->findAll();
    }

    public function getOneInstanceOfOneEntityById($entityType, $id)
    {
        return $this->getEntityRepository($entityType)->find($id);
    }

    //Méthode GET d'une entité (Récupère une instance suivant l'id)
    public function getEntityAction($entityType, $id)
    {
        $instance = $this->getOneInstanceOfOneEntityById($entityType, $id);

        if (empty($instance)) {
            return $this->send404Error();
        }

        return $instance;
    }

    public function postEntityAction($instance, $form, $request)
    {
        $entityManager = $this->getEntityManager();

        //Validation des données
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $entityManager->persist($instance);
            $entityManager->flush();
            return $instance;
        } else {
            return $form;
        }
    }

    public function patchEntityAction($instance, $form, $request)
    {
        $entityManager = $this->getEntityManager();

        if (empty($instance)) {
            return $this->send404Error();
        }

        //Validation des données où l'on ignore si certains champs sont manquants dans la requête
        $form = $form->submit($request->request->all(), false);

        if ($form->isValid()) {
            $entityManager->merge($instance);
            $entityManager->flush();
            return $instance;
        } else {
            return $form;
        }

    }

    public function removeEntityAction($entityType, $id)
    {
        $entityManager = $this->getEntityManager();
        $instance = $this->getOneInstanceOfOneEntityById($entityType, $id);

        if (empty($instance)) {
            return $this->send404Error();
        }

        $entityManager->remove($instance);
        $entityManager->flush();
    }

    public function send404Error()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'Impossible de trouver cet utilisateur'], Response::HTTP_NOT_FOUND);
    }
}
