<?php
/**
 * Photo service.
 */

namespace App\Service;

use App\Entity\Photo;
use App\Repository\PhotoRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class PhotoService.
 */
class PhotoService
{
    /**
     * Photo repository.
     *
     * @var \App\Repository\PhotoRepository
     */
    private $photoRepository;

    /**
     * Paginator.
     *
     * @var \Knp\Component\Pager\PaginatorInterface
     */
    private $paginator;

    /**
     * PhotoService constructor.
     *
     * @param \App\Repository\PhotoRepository         $photoRepository Photo repository
     * @param \Knp\Component\Pager\PaginatorInterface $paginator       Paginator
     */
    public function __construct(PhotoRepository $photoRepository, PaginatorInterface $paginator)
    {
        $this->photoRepository = $photoRepository;
        $this->paginator = $paginator;
    }

    /**
     * Create paginated list.
     *
     * @param int $page Page number
     *
     * @return \Knp\Component\Pager\Pagination\PaginationInterface Paginated list
     */
    public function createPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->photoRepository->queryAll(),
            $page,
            PhotoRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save photo.
     *
     * @param \App\Entity\Photo $photo Photo entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Photo $photo): void
    {
        $this->photoRepository->save($photo);
    }

    /**
     * Delete photo.
     *
     * @param \App\Entity\Photo $photo Photo entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Photo $photo): void
    {
        $this->photoRepository->delete($photo);
    }
}
