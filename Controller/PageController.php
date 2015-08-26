<?php

namespace Rudak\CmsBundle\Controller;

use Rudak\CmsBundle\Entity\Page;
use Rudak\CmsBundle\Form\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Page controller.
 *
 */
class PageController extends Controller
{

	/**
	 * Lists all Page entities.
	 *
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('RudakCmsBundle:Page')->findAll();

		return $this->render('RudakCmsBundle:Page:index.html.twig', array(
			'entities' => $entities,
		));
	}

	/**
	 * Creates a new Page entity.
	 *
	 */
	public function createAction(Request $request)
	{
		$entity = new Page();
		$form   = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$entity->setCreatedAt(new \Datetime());

			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('admin_cms_page_show', array('id' => $entity->getId())));
		}

		return $this->render('RudakCmsBundle:Page:new.html.twig', array(
			'entity' => $entity,
			'form'   => $form->createView(),
		));
	}

	/**
	 * Creates a form to create a Page entity.
	 *
	 * @param Page $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm(Page $entity)
	{
		$form = $this->createForm(new PageType(), $entity, array(
			'action' => $this->generateUrl('admin_cms_page_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array(
			'label' => 'Créer une page',
			'attr'  => array(
				'class' => 'btn btn-primary'
			)
		));

		return $form;
	}

	/**
	 * Displays a form to create a new Page entity.
	 *
	 */
	public function newAction()
	{
		$entity = new Page();
		$form   = $this->createCreateForm($entity);

		return $this->render('RudakCmsBundle:Page:new.html.twig', array(
			'entity' => $entity,
			'form'   => $form->createView(),
		));
	}

	/**
	 * Finds and displays a Page entity.
	 *
	 */
	public function showAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('RudakCmsBundle:Page')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return $this->render('RudakCmsBundle:Page:show.html.twig', array(
			'entity'      => $entity,
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Displays a form to edit an existing Page entity.
	 *
	 */
	public function editAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('RudakCmsBundle:Page')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		$editForm   = $this->createEditForm($entity);
		$deleteForm = $this->createDeleteForm($id);

		return $this->render('RudakCmsBundle:Page:edit.html.twig', array(
			'entity'      => $entity,
			'edit_form'   => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Creates a form to edit a Page entity.
	 *
	 * @param Page $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm(Page $entity)
	{
		$form = $this->createForm(new PageType(), $entity, array(
			'action' => $this->generateUrl('admin_cms_page_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array(
			'label' => 'Modifier',
			'attr'  => array(
				'class' => 'btn btn-warning'
			)
		));

		return $form;
	}

	/**
	 * Edits an existing Page entity.
	 *
	 */
	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('RudakCmsBundle:Page')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm   = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$entity->setLastModifiedAt(new \Datetime());
			$em->flush();

			return $this->redirect($this->generateUrl('admin_cms_page_edit', array('id' => $id)));
		}

		return $this->render('RudakCmsBundle:Page:edit.html.twig', array(
			'entity'      => $entity,
			'edit_form'   => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Deletes a Page entity.
	 *
	 */
	public function deleteAction(Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em     = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('RudakCmsBundle:Page')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Page entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('admin_cms_page'));
	}

	/**
	 * Creates a form to delete a Page entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id)
	{
		return $this->createFormBuilder()
					->setAction($this->generateUrl('admin_cms_page_delete', array('id' => $id)))
					->setMethod('DELETE')
					->add('submit', 'submit', array(
						'label' => 'Supprimer',
						'attr'  => array(
							'class' => 'btn btn-danger'
						)
					))
					->getForm();
	}
}
