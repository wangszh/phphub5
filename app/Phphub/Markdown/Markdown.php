<?php namespace Phphub\Markdown;

use League\HTMLToMarkdown\HtmlConverter;
use Parsedown;
use Purifier;
use ParsedownExtra;

class Markdown
{
    protected $htmlParser;
    protected $markdownParser;

    public function __construct()
    {
        $this->htmlParser = new HtmlConverter(['header_style' => 'atx']);
        $this->markdownParser = new Parsedown();
    }

    public function convertHtmlToMarkdown($html)
    {
        return $this->htmlParser->convert($html);
    }

    public function convertMarkdownToHtml($markdown)
    {
        $convertedHmtl = $this->markdownParser->text($markdown);
        return Purifier::clean($convertedHmtl, 'user_topic_body');
    }
}
