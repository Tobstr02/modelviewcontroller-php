<?php

/**
 * Class DefaultController
 */
class DefaultController
{
    /**
     * indexAction
     *
     * @return string
     * @throws Exception    Wirft Fehler
     */
    public function indexAction()
    {
        $view = new Template( 'test' );
        $view->set_placeholder( 'test', 'foobar' );

        // Gibt die Seite als String für die index.php zurück
	    return $view->getHtml();

    } # function indexAction()


} # class
