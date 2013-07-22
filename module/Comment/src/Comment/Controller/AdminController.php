<?php
/**
 * ZF2 Buch Kapitel 20
 * 
 * Das Buch "Zend Framework 2 - Das Praxisbuch"
 * von Ralf Eggert ist im Galileo-Computing Verlag erschienen. 
 * ISBN 978-3-8362-2610-3
 * 
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.galileocomputing.de/3460
 */

/**
 * namespace definition and usage
 */
namespace Comment\Controller;

use Zend\Http\PhpEnvironment\Response;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Comment\Service\CommentServiceInterface;

/**
 * Admin controller
 * 
 * Handles the admin pages
 * 
 * @package    Comment
 */
class AdminController extends AbstractActionController
{
    /**
     * @var CommentServiceInterface
     */
    protected $commentService;
    
    /**
     * set the comment service
     * 
     * @param CommentServiceInterface
     */
    public function setCommentService(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;

        return $this;
    }
    
    /**
     * Get the comment service
     * 
     * @return CommentServiceInterface
     */
    public function getCommentService()
    {
        return $this->commentService;
    }
    
    /**
     * Handle admin page
     */
    public function indexAction()
    {
        // read page from route
        $page = (int) $this->params()->fromRoute('page');
        
        // set max comment per page
        $maxPage = 10;
        
        // read data and pass to view
        return new ViewModel(array(
            'commentList' => $this->getCommentService()->fetchList($page, $maxPage),
        ));
    }
    
    /**
     * Handle show page
     */
    public function showAction()
    {
        // read id from route and check
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('comment-admin');
        }
        
        // get comment
        $comment = $this->getCommentService()->fetchSingleById($id);
        
        // check comment
        if ($comment === false) {
            return $this->redirect()->toRoute('comment-admin');
        }
        
        // no post or update unsuccesful
        return new ViewModel(array(
            'comment' => $comment,
        ));
    }
    
    /**
     * Handle update page
     */
    public function updateAction()
    {
        // read id from route and check
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('comment-admin');
        }
        
        // prepare Post/Redirect/Get Plugin
        $prg = $this->prg(
            $this->url()->fromRoute('comment-admin/action', array(), array(), true), 
            true
        );
        
        // check PRG plugin for redirect to send
        if ($prg instanceof Response) {
            return $prg;
            
        // check PRG for redirect to process
        } elseif ($prg !== false) {
            // check for cancel
            if (isset($prg['cancel'])) {
                // Redirect to list of comments
                return $this->redirect()->toRoute('comment-admin');
            }
            
            // update with redirected data
            $comment = $this->getCommentService()->save($prg, $id);
            
            // check comment
            if ($comment) {
                // add messages to flash messenger
                $this->flashMessenger()->addMessage(
                    $this->getCommentService()->getMessage()
                );
                
                // Redirect to update comment
                return $this->redirect()->toRoute(
                    'comment-admin/action', array(), array(), true
                );
            }
        }
        
        // get comment
        $comment = $this->getCommentService()->fetchSingleById($id);
        
        // check comment
        if ($comment === false) {
            return $this->redirect()->toRoute('comment-admin');
        }
        
        // get form and bind object
        $form = $this->getCommentService()->getForm('update');
        
        //check prg
        if ($prg === false) {
            $form->bind($comment);
        }
        
        // add messages to flash messenger
        if ($this->getCommentService()->getMessage()) {
            $this->flashMessenger()->addMessage(
                $this->getCommentService()->getMessage()
            );
        }
        
        // no post or update unsuccesful
        return new ViewModel(array(
            'form' => $form,
            'comment' => $comment,
        ));
    }
    
    /**
     * Handle delete page
     */
    public function deleteAction()
    {
        // read id from route and check
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('comment-admin');
        }
        
        // prepare Post/Redirect/Get Plugin
        $prg = $this->prg(
            $this->url()->fromRoute('comment-admin/action', array(), array(), true), 
            true
        );
        
        // check PRG plugin for redirect to send
        if ($prg instanceof Response) {
            return $prg;
            
        // check PRG for redirect to process
        } elseif ($prg !== false) {
            // check for cancel
            if (isset($prg['cancel'])) {
                // Redirect to list of comments
                return $this->redirect()->toRoute('comment-admin');
            }
            
            // delete with redirected data
            $comment = $this->getCommentService()->delete($id);
            
            // check comment
            if ($comment) {
                // add messages to flash messenger
                $this->flashMessenger()->addMessage(
                    $this->getCommentService()->getMessage()
                );
                
                // Redirect to list of comment
                return $this->redirect()->toRoute('comment-admin');
            }
        }
        
        // get comment
        $comment = $this->getCommentService()->fetchSingleById($id);
        
        // check comment
        if ($comment === false) {
            return $this->redirect()->toRoute('comment-admin');
        }
        
        // get form and bind object
        $form = $this->getCommentService()->getForm('delete');
        
        //check prg
        if ($prg === false) {
            $form->bind($comment);
        }
        
        // add messages to flash messenger
        if ($this->getCommentService()->getMessage()) {
            $this->flashMessenger()->addMessage(
                $this->getCommentService()->getMessage()
            );
        }
        
        // no post or update unsuccesful
        return new ViewModel(array(
            'form' => $form,
            'comment' => $comment,
        ));
    }
}
