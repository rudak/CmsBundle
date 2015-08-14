<?php

namespace Rudak\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Category controller.
 *
 */
class AdminController extends Controller
{

	/**
	 * Admin CMS index
	 *
	 */
	public function indexAction()
	{
		return $this->render('RudakCmsBundle:Admin:admin.html.twig');
	}
}
