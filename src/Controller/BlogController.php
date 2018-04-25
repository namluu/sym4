<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\Entity\Post;
use App\Repository\PostRepository;

/**
 * Controller used to manage blog contents in the public part of the site.
 *
 * @Route("/blog")
 *
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/{_locale}", defaults={"page": "1", "_locale": "%locale%"}, name="blog_index")
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function index(int $page, PostRepository $posts): Response
    {
        $latestPosts = $posts->findLatest($page);

        return $this->render('blog/index.html.twig', ['posts' => $latestPosts]);
    }

    /**
     * @Route("/posts/{slug}", name="blog_post")
     * @Method("GET")
     */
    public function postShow(Post $post): Response
    {
        return $this->render('blog/post_show.html.twig', ['post' => $post]);
    }
}