<?php
namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {

    public function indexAction() {
        $url = $this->get('router')->generate(
            'oc_platefrom_view', array('id' => 5)
        );

        return new Response("L'URL de l'annonce d'Id 5 est : " . $url);
    }

    public function testAction() {
        $content = $this->get('templating')->render('bhjbhjbkbnjkPlatformBundle:Advert:test.html.twig', array('nom' => 'Aimrys'));
        return new Response($content);
    }

    public function viewAction($id)
    {
        return $this->redirectToRoute('oc_platform_home');
    }

    public function viewSlugAction($slug, $year, $format) {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '" . $slug . "', créée en " . $year . " et au format " . $format . "."
        );
    }

}
