<?php

namespace App\Admin\Markdown;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Markdown\Parser;

class Markdown extends Model
{
    protected $parser;

    /**
     * Markdown constructor.
     * @param $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    // 转换文字
    public function markdown($text)
    {
        $result= $this->parser->makeHtml($text);
        return $result;
    }
}
