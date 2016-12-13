<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 11/4/16
 * Time: 8:45 AM
 */

namespace App\files\transformers;


class TagTransformer extends Transformer
{

    public function transform($item)
    {
        // TODO: Implement transform() method.
        return [
            'name'=>$item['name'],
        ];
    }
}