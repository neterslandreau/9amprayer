<?php
class MailtoHelper extends HtmlHelper {
/**
* This is a simple method to obfuscate a mailto link to protect email addresses from harvesters.
* Using line seperation has been shown to be effective against virtually all email harvesters
*
* "Out of all of these methods, one method stands out as being effective, usable, accessible,
* functional in all web browsers, JavaScript-free, plugin-free, and easy to author and maintain:
* Split the email address onto two lines"
* from http://nadeausoftware.com/articles/2007/05/effective_methods_protect_email_addresses_spammers
*
* Usage: $mailto->mailto('name@example.com', 'Name')
*
* @param string $address the email address
* @param string $name
* @return string obfuscated link
* @access public
*/
	public function mailto($address = null, $name = null) {
		$mt = 'mailto:';
		$obmt = '';
		for($x = 0; $x < strlen($mt); $x++) {
			$obmt .= '&#' . ord($mt[$x]) . ';';
		}
		$obmt .= "\n";
		$obem = '';
		for($x = 0; $x < strlen($address); $x++) {
			if (ord($address[$x]) === 64) {
				$obem .= "\n" . '&#' . ord($address[$x]) . ';' . "\n";
			} else {
				$obem .= '&#'.ord($address[$x]).';';
			}
		}
		if(!($name)) {
			$name = $obem;
		}
		echo $this->output(preg_replace('/' . $mt . '/', $obmt, sprintf($this->tags['mailto'], $obem, $name, $name)));
	}
}
?>