<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository("Application\Entity\Categoria");

        $categoria = new Categoria();
        $categoria->setNome('Notebooks');

        $em->persist($categoria);
        $em->flush();
//
        $categorias = $repo->findAll();
//
//        $categoria = $repo->find(1);
//
//        $produto = new Produto();
//        $produto->setNome("Game A");
//        $produto->setDescricao("Game é muito Legal");
//        $produto->setCategoria($categoria);
//
//        $em->persist($produto);
//        $em->flush();
//        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
//        $categoriaService->insert('Monitores');
//        $categoriaService->update(array('nome'=>'Monitor','id'=>2));
//
//        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
//        $produtoService->insert(array('id'=>1,'nome'=>'Produto 1','descricao'=>'teste','categoriaId'=>1));

        return new ViewModel(array('categorias'=>$categorias));
    }

}
