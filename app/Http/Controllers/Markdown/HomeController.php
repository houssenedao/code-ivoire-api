<?php

namespace App\Http\Controllers\Markdown;

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Parsedown;
use Symfony\Component\DomCrawler\Crawler;

class HomeController extends Controller
{
    /**
     * The filesystem implementation.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new documentation instance.
     *
     * @param  Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }


    public function home($page = null)
    {
        $sectionPage = $page ?: 'installation';
        $path = base_path('resources/views/docs/content/'. $sectionPage .'.md');

        $indexPath = base_path('resources/views/docs/content/documentation.md');

        if (!$this->files->exists($path)) {
            return abort(404);
        }

        $content = (new Parsedown())->text($this->files->get($path));
        $indexContent = (new Parsedown())->text($this->files->get($indexPath));

        $title = (new Crawler($content))->filterXPath('//h1');

        return view('docs.home', [
            'title' => count($title) ? $title->text() : null,
            'index' => $indexContent,
            'content' => $content,
        ]);
        //return view('docs.home');
    }
}
