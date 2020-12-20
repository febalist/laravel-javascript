<?php

namespace Febalist\Laravel\JavaScript;

use Illuminate\Support\Arr;
use Laracasts\Utilities\JavaScript\Transformers\Transformer;

class JavaScript
{
    protected $data = [];

    public function set($key, $value = null)
    {
        Arr::set($this->data, $key, $value);
    }

    public function get($key = null)
    {
        return Arr::get($this->data, $key);
    }

    public function render()
    {
        $transformer = new Transformer(
            new EmptyViewBinder(),
            config('javascript.js_namespace')
        );
        $js = $transformer->put($this->data);

        echo "<script>{$js}</script>";
    }
}
