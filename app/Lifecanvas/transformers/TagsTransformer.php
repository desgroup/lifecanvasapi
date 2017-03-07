<?php 

namespace App\lifecanvas\transformers;

class TagsTransformer extends Transformer {

	public function transform($tags)
    {
        return [
                'name'  => $tags['name'],
        ];
    }
}