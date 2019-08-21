<?php
/**
 * Class Autoloader
 * Loads a class on call
 */
class Autoloader
{

    /**
     * All directorys to search for classes
     * You can add directorys if you want
     * @var static $directorys
     *
     **/
    private static $directorys = array('classes', 'controller', 'model', 'views');

    /**
     * Load's the autoloader
	 * 
     * @return void
     */
	public function __construct()
	{
		if ( !spl_autoload_register( array( $this, 'load_class' ) ) )
		{
			die('A fatal error has occurred.');
		}

	} # function __construct()

    /**
     * register the autoloader
     *
     * @return void
     */
	public static function register()
	{
		new Autoloader();

	} # function register()


    /**
     * Loads a class
     *
     * @param string $a_class_name    Klassen-Name
     * @return void
     *
     */
	public function load_class( $a_class_name )
	{
		foreach ( self::$directorys as $folder )
		{
			$file = __DIR__ . '/../' . $folder . '/' . $a_class_name . '.class.inc.php';

			if ( file_exists( $file ) )
			{
				require_once $file;
			}
			else
			{
				$file = __DIR__ . '/../' . $folder . '/' . mb_strtolower( $a_class_name ) . '.class.inc.php';
				if ( file_exists( $file ) )
                {
                   	require_once $file;
				}
			}
		}

	} # function load_class(...)
} # class
