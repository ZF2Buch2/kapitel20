<?php
/**
 * ZF2 Buch Kapitel 20
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Comment\Form;

use Comment\Filter\CommentFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Delete form factory
 * 
 * @package    Comment
 */
class DeleteFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new CommentForm('delete');
        $form->addIdElement();
        $form->addCsrfElement();
        $form->addSubmitElement('delete', 'Löschen');
        $form->addSubmitElement('cancel', 'Abbrechen');
        $form->setInputFilter(new CommentFilter());
        $form->setValidationGroup(array('id', 'delete', 'cancel'));
        return $form;
    }
}
