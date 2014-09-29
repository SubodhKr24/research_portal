<?php
/**
 * @version		1.0.0
 * @copyright 	Beautiful-Templates.com
 * @author		Neo
 * @link		http://www.beautiful-templates.com
 * @license		License GNU General Public License version 2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class plgSystemST_Author extends JPlugin
{
	public function __construct(& $subject, $config)
	{
	        parent::__construct($subject, $config);
	        $language = JFactory::getLanguage();
			$language->load('st_author', JPATH_ADMINISTRATOR, 'en-GB', true);
			$language->load('st_author', JPATH_ADMINISTRATOR, null, true);
	}
	public function onAfterDispatch() 
	{
		$app = JFactory::getApplication();
	  	$doc = JFactory::getDocument();
		
		if ($app->isSite()) {
			$doc->addStyleSheet(JUri::base(). '/plugins/system/st_author/css/style.css');
		}
	}
	
	public function onContentAfterDisplay($context, &$article, &$params, $limitstart=0)
	{
		if ($context == 'com_content.article') 
		{
		 	$cdd_article =& JTable::getInstance('content');
			$cdd_article->load(JRequest::getInt('id'));
			$cdd_authorid = $cdd_article->created_by;
			
			$db =& JFactory::getDBO(); //Establish DB Link
			$query = "SELECT name,username  FROM #__users WHERE id = " . $cdd_authorid ;
			$db->setQuery($query); //Execute query. Should return 1 row
			$user = $db->loadAssoc(); //Load results as associative array
			
			$name = $user['name'];
			$username = $user['username'];
			
			$full_name = $this->params->def('full_name', $name);
			$images = $this->params->def('images', JUri::base().'plugin/st_author/css/user.png');
			$introduce = $this->params->def('introduce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
			$facebook = $this->params->def('facebook', 'http://facebook.com');
			$twitter = $this->params->def('twitter', 'http://twitter.com');
			$dribble = $this->params->def('dribble', 'http://dribbble.com');
			$print = $this->params->def('print', 'http://www.printmag.com');
			
			$html="<div class='st-author'>
						<h3 class='title'>About the author / <span>".$name."</span></h3>
						<div class='images'>
							<img src='".JUri::base().$images."' alt='".$name."'/>
						</div>
						<div class='content'>
							<h4>".$full_name."</h4>
							<p>".$introduce."</p>
							<ul class='social'>
								<li><a class='facebook' href='".$facebook."'></a></li>
								<li><a class='twitter' href='".$twitter."'></a></li>
								<li><a class='dribble' href='".$dribble."'></a></li>
								<li><a class='print' href='".$print."'></a></li>
							</ul>
						</div>
					</div>";

			return $html;
		}
	}
}
?>
