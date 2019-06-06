<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\RegistrationAdminType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityAdminController extends AbstractController
{
    /**
     * @Route("/registration", name="security_admin_registration")
     * @param Request $request
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function registration(Request $request, ObjectManager $manager,
                                UserPasswordEncoderInterface $encoder){
        $admin = new Admin();

        $form = $this->createForm(RegistrationAdminType::class,$admin);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hashPassword = $encoder->encodePassword($admin, $admin->getPassword());
            $hashMail = $encoder->encodePassword($admin, $admin->getMail());
            $admin->setPassword($hashPassword);
            $admin->setMail($hashMail);

            $manager->persist($admin);
            $manager->flush();

            return $this->redirectToRoute('security_admin_login');
        }

        return $this->render('securityAdmin/registration.html.twig',array(
           'form'=>$form->createView(),
            'titre'=>'Registration',
            'menuLeft'=>null
        ));
    }

    /**
     * @Route("/login", name="security_admin_login")
     * @return Response
     */
    public function login(){
        return $this->render('securityAdmin/login.html.twig',array(
            'titre'=>'Login',
            'menuLeft'=>null
        ));
    }
}
