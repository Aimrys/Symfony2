<?php
namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{

    public function indexAction($page)
    {
        if ($page < 1){
            throw new NotFoundHttpException('Page "'.$page.'"Inexistante.');
        }
    }

    public function testAction()
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:test.html.twig', array('nom' => 'Aimrys'));
        return new Response($content);
    }

    public function viewAction($id)
    {
        return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id));
    }

    public function addAction(Request $request)
    {
        $session = $request->getSession();

        $session->getFlashBag()->add('info', 'Annonce bien enregistrée');

        $session->getFlashBag()->add('info', 'Oui oui elle est bien enregistrée !');

        return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }


    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '" . $slug . "', créée en " . $year . " et au format " . $format . "."
        );
    }

}
