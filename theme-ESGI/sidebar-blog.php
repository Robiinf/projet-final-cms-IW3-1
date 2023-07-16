<?php if(!dynamic_sidebar('blog_sidebar')): ?>

    <div class="search">
        <h6>Search</h6>
        <?php get_search_form(); ?>
    </div>
    <div>
        <h6>Recent Posts</h6>
        <?php $recent_posts = wp_get_recent_posts(['numberposts' => 4]); ?>
        <?php foreach($recent_posts as $recent): ?>
            <div class="recent-post">
                <div class="square-crop">
                    <img class="" src="<?= get_the_post_thumbnail_url($recent['ID']) ?>" alt="">
                </div>
                <div>
                    <p class="p20"><a href="<?= the_permalink()?>"><?= $recent['post_title'] ?></a></p>
                    <p class="p20"><?= get_the_category_list(', ') . ', ' . get_the_date() ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="archives">
        <h6>Archives</h6>
        <ul class="ul-sidebar">
            <?php wp_get_archives(['type' => 'monthly']); ?>
        </ul>
    </div>
    <div class="categories">
        <h6>Categories</h6>
        <ul class="ul-sidebar">
            <?php wp_list_categories(['title_li' => '']); ?>
        </ul>
    </div>
    <div>
        <h6>Tags</h6>
        <?php $tag = wp_tag_cloud( 'format=array' ); ?>
        <div class="tags">
            <?php foreach($tag as $t): ?>
                <div class="tag">
                    <p class="p20"><?= $t ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>



<?php endif; ?>