<?php

/**
 * Template Class
 * Templates are stored under templates/
 * A placeholder is created with [[NAME OF PLACEHOLDER]]
 */
class Template
{
    /**
     * Variables for Template Class
     */
    /**
     * @var string  To store informations while class is defined
     */
    private $template;

    /**
     * Template constructor
     * .
     * @param string $a_file_name  Template file name(without .tmpl.html)
     * @throws Exception    Template not found Exception
     */
    public function __construct( $a_file_name )
    {
        $path = __DIR__ . "/../templates/{$a_file_name}.tmpl.html";

        # Template existiert nicht
        if ( !file_exists( $path ) )
        {
            throw new RuntimeException( "Template '$a_file_name' doesn't exist!", 2 );
        }

        $this->template = file_get_contents( $path );

    } # function __construct(...)

    /**
     * Replaces a placeholder with a string
     *
     * @param string $a_key Key of the placeholder
     * @param string $a_value   Replace this with the key
     *
     * @throws Exception    Wirft Exception
     * @return void
     *
     */
    public function set_placeholder( $a_key, $a_value )
    {
        if ( empty( $a_value ) )
        {
            $a_value = '-';
        }
        $a_key = mb_strtoupper( $a_key );
        $key = '[[' . $a_key . ']]';

        $this->template = str_replace( $key, $a_value, $this->template );

    } # function set_placeholder(...)

    /**
     * Removes all unused placeholders
     *
     * @return void
     */
    private function removePlaceholder()
    {
        $this->template = preg_replace( '/\[\[.*]]/', '', $this->template );

    }  # function removePlaceholder()

    /**
     * Return the template as string
     *
     * @return string
     */
    public function getHtml()
    {
        # Remove all unreplaced placeholders
        $this->removePlaceholder();

        return $this->template;

    } # function getHtml()




} # class