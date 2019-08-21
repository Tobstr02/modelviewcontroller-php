<?php
/**
 * Class Autoloader
 * Lädt die Klassen automatisch, solange sie in den vorhandenen Ordnern sind
 */
class autoloader
{

    /*
     * Alle Verzeichnisse in denen Klassen automatisch geladen werden sollen
     * @var static
     */
    # todo Hier Verzeichnisse einfügen, falls benötigt
    private static $directorys = array('classes', 'controller', 'model', 'views');

    /**
     * Autoloader constructor.
	 * 
     * @return void
     */
	public function __construct()
	{
		if ( !spl_autoload_register( array( $this, 'load_class' ) ) )
		{
			die("A fatal error has occurred.");
		}

	} # function __construct()

    /**
     * Registriert den Autoloader
     *
     * @return void
     */
	public static function register()
	{
		new Autoloader();
		return void;

	} # function register()


    /**
     * Lädt die Klasse
     *
     * @param string $a_class_name    Klassen-Name
     * @return void
     *
     */
	public function load_class( $a_class_name )
	{
		foreach ( self::$directorys as $folder )
		{
			$file = __DIR__ . "/../" . $folder . '/' . $a_class_name . '.class.inc.php';

			if ( file_exists( $file ) )
			{
				require_once( $file );
			}
			else
			{
				$file = __DIR__ . '/../' . $folder . '/' . mb_strtolower( $a_class_name ) . '.class.inc.php';
				if ( file_exists( $file ) )
                {
                   	require_once( $file );
				}
			}
		}
		return void;

	} # function load_class(...)
} # class
