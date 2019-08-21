<?php

/**
 * Template Klasse
 * Templates werden unter "templates" erstellt.
 * Ein Template Platzhalter wird mit [[NAME]] erstellt.
 */
class Template
{
    /**
     * Variablen als Privat definieren
     */
    /**
     * @var string     Variable für Template
     */
    private $template = '';

    /**
     * Konstruktor
     *
     * @param $a_file_name
     *
     * @throws Exception
     */
    #Dateiinhalte speichern

    /**
     * Template constructor
     * .
     * @param string $a_file_name  Dateiname
     * @throws Exception    Wirft Exception
     */
    public function __construct( $a_file_name )
    {
        $path = __DIR__ . "/../templates/{$a_file_name}.tmpl.html";

        # Template existiert nicht
        if ( !file_exists( $path ) )
        {
            throw new Exception( "Template '$a_file_name' existiert nicht!", 2 );
        }

        $this->template = file_get_contents( $path );
        return void;

    } # function __construct(...)

    /**
     * Speichert sich die Platzhalter und ersetzt diese z.B. [[TABLE]] zu "<table>..."
     *
     * @param string $a_key Der Key zum Suchen
     * @param string $a_value   Gegen was es ersetzt werden soll
     *
     * @throws Exception    Wirft Exception
     * @return void
     *
     */
    public function set_placeholder( $a_key, $a_value )
    {
        if ( empty( $a_value ) )
        {
            $a_value = "E006#TMPL";
        }
        $a_key = mb_strtoupper( $a_key );
        $key = '[[' . $a_key . ']]';
        # Hier in $this->template ersetzen
        $this->template = str_replace( $key, $a_value, $this->template );
        return void;

    } # function set_placeholder(...)

    /**
     * Entfernt alle unbenutzen Platzhalter
     *
     * @return void
     */
    private function removePlaceholder()
    {
        $this->template = preg_replace( '/\[\[.*\]\]/', '', $this->template );
        return void;

    }  # function removePlaceholder()

    /**
     * Gibt das Template als HTML-Format zurück
     *
     * @return string
     */
    public function getHtml()
    {
        # Entfernt die nicht ersetzten Platzhalter
        $this->removePlaceholder();

        return $this->template;

    } # function getHtml()




} # class