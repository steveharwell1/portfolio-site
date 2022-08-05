<?php
global $steves_block_theme;
$text_domain = $steves_block_theme->text_domain;
return array(
	'title'      => __( 'Large header with dark background', $text_domain ),
	'categories' => array( 'query' ),
	'blockTypes' => array( 'core/query' ),
	'content'    => '
    <!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":8},"align":"wide"} -->
					<div class="wp-block-query alignwide">
                        <!-- wp:post-template -->
                            <!-- wp:heading {"align":"wide","style":{"typography":{"fontSize":"clamp(3.25rem, 8vw, 6.25rem)","lineHeight":"1.15"}}} -->
                                <h2 class="alignwide" style="font-size:clamp(3.25rem, 8vw, 6.25rem);line-height:1.15">Hello There</h2>
                            <!-- /wp:heading -->
                        <!-- /wp:post-template -->
                    </div>
					<!-- /wp:query -->
					',
);