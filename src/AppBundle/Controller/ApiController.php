<?php 
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiController extends FOSRestController
{
    /**
     * @Rest\Get("/api/user")
     */
    public function getUsersAction()
    {   
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        if ($users === null) 
            return new View("No se han encontrado usuarios.", Response::HTTP_NOT_FOUND);

        return $users;
    }

    /**
     * @Rest\Get("/api/user/{id}")
     */
    public function getUserAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if ($user === null) 
            return new View("No se ha encontrado el usuario.", Response::HTTP_NOT_FOUND);
        
        return $user;
    }

    /**
    * @Rest\Post("/api/user")
    */

    public function createUserAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User;
        $name = $request->get('name');
        $username = $request->get('username');
        
        $password = $encoder->encodePassword($user, $request->get('password'));
        $roles = $request->get('roles');

        $user->setName($name);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setRoles($roles);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new View("Usuario creado correctamente", Response::HTTP_OK);
    }

    /**
    * @Rest\Put("/api/user/{id}")
    */
    public function updateUserAction(Request $request, $id)
    { 
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        $name = ($request->get('name')) ? $request->get('name') : $user->getName();
        $username = ($request->get('username')) ? $request->get('username') : $user->getUsername();
        $password = ($request->get('password')) ? $request->get('password') : $user->getPassword();
        $roles = ($request->get('roles')) ? $request->get('roles') : $user->getRoles();
        
        if (empty($user)) {
            return new View("Usuario no encontrado", Response::HTTP_NOT_FOUND);
        } else {
            $user->setName($name);
            $user->setRoles($roles);
            $user->setUsername($username);
            $user->setPassword($password);
            $em->flush();
            return new View("Usuario actualizado correctamente", Response::HTTP_OK);
        }
    }

    /**
    * @Rest\Delete("/api/user/{id}")
    */
    public function deleteUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        if (empty($user)) {
            return new View("Usuario no encontrado", Response::HTTP_NOT_FOUND);
        }
        else {
            $em->remove($user);
            $em->flush();
        }

        return new View("Usuario borrado correctamente", Response::HTTP_OK);
    }

}
