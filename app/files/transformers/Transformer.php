<?php

namespace App\files\transformers;

/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 11/4/16
 * Time: 8:40 AM
 */
abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }
    
    public abstract function transform($item);

}