<?php

namespace Rudak\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Category controller.
 *
 */
class DefaultController extends Controller
{

	/**
	 * Admin CMS index
	 *
	 */
	public function PageAction($id, $name)
	{
		$em     = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('RudakCmsBundle:Page')->find($id);

		# TODO filtrer avec l'ip ou la session pour incrémenter seulement une fois par tranche de 20 minutes
		$entity->setHit($entity->getHit() + 1);

		$em->flush();
		return $this->render('RudakCmsBundle:Default:page.html.twig', array(
			'page' => $entity,
		));
	}
}
