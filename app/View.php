<?php

declare(strict_types=1);

namespace App;

class View
{
    /**
     * Render a view template using Twig
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate(string $template, array $args = []): void
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(__DIR__);
            $twig = new \Twig\Environment($loader);
        }

        echo $twig->render("{$template}.html.twig", $args);
    }
}
