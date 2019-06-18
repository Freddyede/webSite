<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController

{
    /**
     * @Route("/login", name="login", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function login(Request $request) {
        $data = json_decode($request->getContent());
        $mail = $data->mail;
        $user = $this->getDoctrine()->getRepository(Users::class)->findOneBy(
            ['mail'=>$mail]
        );
        $response = new Response($this->get('serializer')->serialize($user,'json'));
        $pass = $data->password;
        if ($user->getPassword() === hash('ripemd160',$pass)){
            return $response;
        }
        return new Response($this->get('serializer')->serialize('{status:500}','json'));
    }
}
