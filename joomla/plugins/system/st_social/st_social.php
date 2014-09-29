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

class plgSystemST_Social extends JPlugin
{
	public function onAfterDispatch() 
	{
		$app = JFactory::getApplication();
	  	$doc = JFactory::getDocument();
		
		if ($app->isSite()) {
			$doc->addStyleSheet(JUri::base(). '/plugins/system/st_social/assets/css/social.css');
		}
	}
	public function onContentAfterDisplay($context, &$article, &$params, $limitstart=0)
	{
		if ($context == 'com_content.article') 
		{
			
		 	$uri = JURI::getInstance($article->readmore_link);
			$image = @JURI::base().json_decode($article->images)->image_intro;
			$title = $article->title;
			$url = $uri->getHost(). $article->readmore_link;
			$facebook = '<div class="facebook">';
			$facebook .= '<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=262357397227600";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, \'script\', \'facebook-jssdk\'));</script>';	
			$facebook .= '<div class="fb-like" 
							data-href="'.$url.'" 
							data-width="450" data-layout="button_count" 
							data-show-faces="false" data-send="true"></div>';
			$facebook .= '</div>';
			
			$twitter = '<div class="twitter">';
			$twitter .= '<a href="https://twitter.com/share" class="twitter-share-button" 
						url ="'.$url.'"
						data-via="cooltemplates" 
						data-lang="en">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
			$twitter .= '</div>';
			
			$linkedin = '<div class="linkedin">';
			$linkedin .= '<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script
							data-url="'.$url.'" 
							type="IN/Share" 
							data-counter="right"></script>';
			$linkedin .= '</div>';
			
			$pinterest = '<div class="pinterest">';
			$pinterest .= '<a target="blank" href="//www.pinterest.com/pin/create/button/?url='.urlencode($url).'&media='.urlencode($image).'&description='.urlencode($title).'" 
								data-pin-do="buttonPin" 
								data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>';
			$pinterest .= '</div>';
			
			
			$html = '<div class="st-plg-social">'. $facebook.$twitter.$linkedin.$pinterest. '</div>';
			
			if($this->params->def('position','1')==1){
				return $html;
			}else{
				return null;
			}
		}
	}

	public function onContentBeforeDisplay($context, &$article, &$params, $limitstart=0)
		{
		if ($context == 'com_content.article') 
		{
			
		 	$uri = JURI::getInstance($article->readmore_link);
			$image = @JURI::base().json_decode($article->images)->image_intro;
			$title = $article->title;
			$url = $uri->getHost(). $article->readmore_link;
			$facebook = '<div class="facebook">';
			$facebook .= '<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=262357397227600";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, \'script\', \'facebook-jssdk\'));</script>';	
			$facebook .= '<div class="fb-like" 
							data-href="'.$url.'" 
							data-width="450" data-layout="button_count" 
							data-show-faces="false" data-send="true"></div>';
			$facebook .= '</div>';
			
			$twitter = '<div class="twitter">';
			$twitter .= '<a href="https://twitter.com/share" class="twitter-share-button" 
						url ="'.$url.'"
						data-via="cooltemplates" 
						data-lang="en">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
			$twitter .= '</div>';
			
			$linkedin = '<div class="linkedin">';
			$linkedin .= '<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script
							data-url="'.$url.'" 
							type="IN/Share" 
							data-counter="right"></script>';
			$linkedin .= '</div>';
			
			$pinterest = '<div class="pinterest">';
			$pinterest .= '<a target="blank" href="//www.pinterest.com/pin/create/button/?url='.urlencode($url).'&media='.urlencode($image).'&description='.urlencode($title).'" 
								data-pin-do="buttonPin" 
								data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>';
			$pinterest .= '</div>';
			
			
			$html = '<div class="st-plg-social">'. $facebook.$twitter.$linkedin.$pinterest. '</div>';
			
			if($this->params->def('position','1')==0){
				return $html;
			}else{
				return null;
			}
		}
	}
}
