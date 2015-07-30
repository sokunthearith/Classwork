<?php
namespace WE\Classwork\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WE.Classwork".          *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use WE\Classwork\Domain\Model\Post;

class PostController extends ActionController {

    /**
     * @Flow\Inject
     * @var \WE\Classwork\Domain\Repository\PostRepository
     */
    protected $postRepository;

    /**
     * @Flow\Inject
     * @var \WE\Classwork\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @Flow\Inject
     * @var \WE\Classwork\Domain\Repository\AuthorRepository
     */
    protected $authorRepository;

    /**
     * @return void
     */
    public function indexAction() {
        $this->view->assign('posts', $this->postRepository->findAll());
    }

    /**
     * @param \WE\Classwork\Domain\Model\Post $post
     * @return void
     */
    public function showAction(Post $post) {
        $this->view->assign('post', $post);
    }

    /**
     * @return void
     */
    public function newAction() {
        $this->view->assign('listCategory', $this->categoryRepository->findAll());
        //$this->view->assign('identity'), $this->questionRepository->findByIdentifier();
        $this->view->assign('listAuthor', $this->authorRepository->findAll());
    }

    /**
     * @param \WE\Classwork\Domain\Model\Post $newPost
     * @return void
     */
    public function createAction(Post $newPost) {
//        \TYPO3\Flow\var_dump($newPost);
//        die();
        $this->postRepository->add($newPost);
        $this->addFlashMessage('Created a new post.');
        $this->redirect('index');
    }


    /**
     * @param \WE\Classwork\Domain\Model\Post $post
     * @return void
     */
    public function editAction(Post $post) {
        $this->view->assign('post', $post);
    }

    /**
     * @param \WE\Classwork\Domain\Model\Post $post
     * @return void
     */
    public function updateAction(Post $post) {
        $this->postRepository->update($post);
        $this->addFlashMessage('Updated the post.');
        $this->redirect('index');
    }

    /**
     * @param \WE\Classwork\Domain\Model\Post $post
     * @return void
     */
    public function deleteAction(Post $post) {
        $this->postRepository->remove($post);
        $this->addFlashMessage('Deleted a post.');
        $this->redirect('index');
    }

}