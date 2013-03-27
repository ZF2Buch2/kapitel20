<?php
/**
 * ZF2 Buch Kapitel 20
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    SpamCheck
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace SpamCheck\View\Helper;

use SpamCheck\Service\B8Service;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

/**
 * Provides access to b8 view helper
 * 
 * Outputs the the spam classification
 * 
 * @package    SpamCheck
 */
class SpamCheck extends AbstractHelper
{
}
