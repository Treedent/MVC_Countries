<?php
// Espace de nom VENDOR_NAME\Catégorie
namespace MVC\Controllers;

/*** Controleur principal ***/
class Controller {

    const VIEWPATH = __DIR__ . '/../../../resources/views';
    const LAYOUT_EXT = '.layout.php';
    const TMPL_EXT = '.tmpl.php';
    const PAGETITLE = 'MVC Countries';

	protected function render($layout, $view, $data = null, $nbdata = null, $nbperpage = null): string
    {
        // Récupère le layout
        $layout_ar = explode('.', $layout);
        ob_start();
        require(self::VIEWPATH . '/' . $layout_ar[0] . '/' . $layout_ar[1] . self::LAYOUT_EXT);
        $layout_content = ob_get_contents();
        ob_end_clean();
        $layout = str_replace('{pageTitle}', self::PAGETITLE, $layout_content);

        // Récupère le template de contenus
        $view_ar = explode('.', $view );
        ob_start();
        require(self::VIEWPATH . '/' . $view_ar[0] . '/' . $view_ar[1] . self::TMPL_EXT);
        $view_content = ob_get_contents();
        ob_end_clean();
        return str_replace('{pageContent}', $view_content, $layout);
    }
}