<?php
/**
 * @package Simple Buzz - A simple Google Buzz plugin for Wordpress
 * @author Antonio Bustamante Mirayo
 * @version 0.6
 */
/*
Plugin Name: Simple Buzz 
Plugin URI: http://www.sensei21.com
Description: A simple plugin that uses Google Buzz API to show to the visitors your last Google Buzz status.
Author: Antonio Bustamante Mirayo
Version: 0.6
Author URI: http://www.sensei21.com
*/
	// The $id needs to be your Google profile number or, if configured, nickname (further explanations in README).
	function simple_buzz($id='',$num=1) {
		if ($id=='') {
			echo "A Google Buzz username must be specified";
			return -1;
		}
		
		$result = process('http://buzz.googleapis.com/feeds/'.$id.'/public/posted');
		
		if ($result == 'NO') {
			echo "User does not exist or data n/a";
			return -1;
		}
		
		if ($num!=1) {
			echo "<ul>\n";
			for ($i=0;$i < $num; $i++) {
				$status = $result->entry[$i]->content;
				// The name of the following variable explains my frustration. Why surround with <div> the user status in an XML? I don't know, but I don't like it...
				$html_shit = array("<div>","</div>");
				$status = str_replace($html_shit, "", $status);
				echo "<li>";
				echo $status;
				echo "</li>";
			}
			echo "</ul>";
			return 1;
		}

		echo $result->entry[0]->content;
	}
    
    // Makes the connection
    function process($url){
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);                   
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);           

        $response = curl_exec($ch);
        
        $responseInfo=curl_getinfo($ch);
        curl_close($ch);
        
        
        if(intval($responseInfo['http_code'])==200){
            if(class_exists('SimpleXMLElement')){
                $xml = new SimpleXMLElement($response);
                return $xml;
            }else{
                return $response;    
            }
        }else{
            return 'NO';
        }
    }  

?>