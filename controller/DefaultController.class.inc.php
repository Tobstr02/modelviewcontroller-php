<?php

/**
 * Class DefaultController
 */
class DefaultController
{
    /**
     * The default index test controller
     *
     * @return string   HTML Code
     * @throws Exception
     */
    public function indexAction()
    {
        $view = new Template( 'test' );

        $DefaultModel = new DefaultModel();
        $value = $DefaultModel->getTestMessage();

        $view->set_placeholder( 'test', $value );

        // Return the HTML Code to the index.php
	    return $view->getHtml();

    } # function indexAction()


} # class
