<?php
/**
 * UserData contorller.
 */

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserData;
use App\Form\UserDataType;
use App\Repository\UserDataRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserDataController.
 *
 * @Route("/userData")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class UserDataController extends AbstractController
{
    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request            HTTP request
     * @param \App\Entity\UserData                      $userData           UserData entity
     * @param \App\Repository\UserDataRepository        $userDataRepository UserData repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/{id}/edit",
     *     methods={"GET", "PUT"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="userData_edit",
     * )
     */
    public function edit(Request $request, UserDataRepository $userDataRepository, UserRepository $userRepository, User $user): Response
    {
        /*$user = $userRepository->find($id);*/
        $userData = $user->getUserData();
        $form = $this->createForm(UserDataType::class, $userData, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userData = $form->getData();

            $userDataRepository->save($userData);

            $this->addFlash('success', 'message_updated_successfully');

            return $this->redirectToRoute('user_index');
        }

        return $this->render(
            'userData/edit.html.twig',
            [
                'form' => $form->createView(),
                'userData' => $userData,
            ]
        );
    }
}
