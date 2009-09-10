<?php
 
class ImageBBCode {

	function imageOpenHook( &$imagePage, &$output ) {
		global $wgTitle;
		global $wgServer;
		if ( $wgTitle->getNamespace() == NS_IMAGE ) {

			$file = wfFindFile($wgTitle);
			//$fileURL = $file->getFullURL(); // or getFullURL()
			$thumb = $file->getThumbnail(200);
			$thumbURL = $wgServer . ($thumb->getURL());
			$pageURL = $wgServer . $file->getDescriptionURL();
			$embedCode = Xml::openElement( 'small' );
			$embedCode .= wfMsg ( 'title' ) ;
			$embedCode .= Xml::closeElement( 'small' );
			$embedCode .= Xml::element( 'input', array( 'type' => 'text', 'value' => '[url=' . $pageURL . '][img]' . $thumbURL . '[/img][/url]', 'size' => '20%' ) ) ;
			$embedCode .= Xml::openElement( 'small' );
			$embedCode .= wfMsg ( 'instructions' ) ;
			$embedCode .= Xml::closeElement( 'small' );

			$output->addHTML( $embedCode );
		}
		return true;
	}
}
