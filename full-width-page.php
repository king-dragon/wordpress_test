<?php
/*
* Template Name: Full Width Page
*/
get_header();
?>


<!-- Page Title
        ============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1><?php single_post_title(); ?></h1>
        <span>
            <?php if (function_exists('the_subtitle')) {
                the_subtitle();
            } ?>
        </span>
    </div>
</section><!-- #page-title end -->




<!-- Content
    ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <?php

            while (have_posts()) {
                the_post();

                global $post;
                $author_ID          = $post->post_author;
                $author_URL          = get_author_posts_url($author_ID);
            ?>
                <div class="single-post nobottommargin">

                    <!-- Single Post
                            ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Image
                                ============================================= -->
                        <?php
                        if (has_post_thumbnail()) {
                        ?>
                            <div class="entry-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- .entry-image end -->

                        <!-- Entry Content
                                ============================================= -->
                        <div class="entry-content notopmargin">
                            <?php
                            the_content();
                            $defualts = array(
                                'before'    =>  '<p class="text-center">' . __('Pages', 'Test'),
                                'after'     =>  '</p>'
                            );
                            wp_link_pages($defualts);
                            ?>
                            <!-- Post Single - Content End -->

                            <div class="clear"></div>

                        </div>


                        <div class="line"></div>
                        <?php
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                        ?>

                    </div>

                </div><!-- .entry end -->
            <?php
            }

            ?>

        </div>

    </div>

</section><!-- #content end -->

<?php get_footer(); ?>