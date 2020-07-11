<?php
/**
 * Photo controller.
 */

namespace App\Controller;

use App\Entity\Photo;
use App\Form\PhotoType;
use App\Repository\PhotoRepository;
use App\Service\PhotoService;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PhotoController
 * @Route("/photo")
 */
class PhotoController extends AbstractController
{
    /**
     * Photo service.
     *
     * @var \App\Service\PhotoService
     */
    private $photoService;


    /**
     * File uploader.
     *
     * @var \App\Service\FileUploader
     */
    private $fileUploader;

    /**
     * Filesystem component
     * @var Filesystem
     */
    private $filesystem;

    /**
     * PhotoController constructor.
     *
     * @param \App\Service\FileUploader       $fileUploader    File uploader
     * @param \App\Service\PhotoService $photoService Photo service
     */
    public function __construct(Filesystem $filesystem, FileUploader $fileUploader, PhotoService $photoService)
    {
        $this->filesystem = $filesystem;
        $this->fileUploader = $fileUploader;
        $this->photoService = $photoService;
    }

    /**
     * Index action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request         HTTP request
     * @param \Knp\Component\Pager\PaginatorInterface   $paginator       Paginator
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     * @Route(
     *     "/",
     *     methods={"GET"},
     *     name="photo_index",
     * )
     */
    public function index(Request $request): Response
    {
        $page = $request->query->getInt('page', 1);
        $pagination = $this->photoService->createPaginatedList($page);

        return $this->render(
            'photo/index.html.twig',
            ['pagination' => $pagination]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Photo $photo photo entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="photo_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     *
     *
     */
    public function show(Photo $photo): Response
    {
        return $this->render(
            'photo/show.html.twig',
            ['photo' => $photo]
        );
    }

    /**
     * Create action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request         HTTP request
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/create",
     *     methods={"GET", "POST"},
     *     name="photo_create",
     * )
     */
    public function create(Request $request): Response
    {
        $photo = new Photo();
        $form = $this->createForm(PhotoType::class, $photo, ['validation_groups' => ['create']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFilename = $this->fileUploader->upload(
                $form->get('photo')->getData()
            );
            $photo->setAuthor($this->getUser());
            $photo->setPhoto($photoFilename);
            $photo = $form->getData();
            $this->photoService->save($photo);

            $this->addFlash('success', 'message_created_successfully');

            return $this->redirectToRoute('photo_index');
        }

        return $this->render(
            'photo/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request         HTTP request
     * @param \App\Entity\Photo                         $photo           Photo entity
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
     *     name="photo_edit",
     * )
     *
     * @IsGranted(
     *     "EDIT",
     *     subject="photo",
     * )
     */
    public function edit(Request $request, Photo $photo): Response
    {
        $form = $this->createForm(PhotoType::class, $photo, ['method' => 'PUT']);
        $form->handleRequest($request);

        $originalPhoto = clone $photo;
        if ($form->isSubmitted() && $form->isValid()) {
            $photo = $form->getData();
            $photo->setPhoto($originalPhoto->getPhoto());
            $this->photoService->save($photo);

            $this->addFlash('success', 'message_updated_successfully');

            return $this->redirectToRoute('photo_index');
        }

        return $this->render(
            'photo/edit.html.twig',
            [
                'form'  => $form->createView(),
                'photo' => $photo,
            ]
        );
    }

    /**
     * Delete action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request         HTTP request
     * @param \App\Entity\Photo                         $photo           Photo entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/{id}/delete",
     *     methods={"GET", "DELETE"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="photo_delete",
     * )
     *
     * @IsGranted(
     *     "DELETE",
     *     subject="photo"
     * )
     */
    public function delete(Request $request, Photo $photo): Response
    {
        $form = $this->createForm(FormType::class, $photo, ['method' => 'DELETE']);
        $form->handleRequest($request);

        if ($request->isMethod('DELETE') && !$form->isSubmitted()) {
            $form->submit($request->request->get($form->getName()));
        }

        $fullName = $this->getParameter('photos_directory') . DIRECTORY_SEPARATOR . $photo->getPhoto();
        $fullName = str_replace('/', DIRECTORY_SEPARATOR, $fullName);
        //echo $fullName;
        if ($form->isSubmitted() && $form->isValid()) {
            $this->filesystem->remove($fullName);
            $this->photoService->delete($photo);
            $this->addFlash('success', 'message.deleted_successfully');

            return $this->redirectToRoute('photo_index');
        }

        return $this->render(
            'photo/delete.html.twig',
            [
                'form'  => $form->createView(),
                'photo' => $photo,
            ]
        );
    }
}
