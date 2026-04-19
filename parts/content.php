                                    <article class="post card">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="post-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail( 'medium' ); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="post-info">
                                            <p class="post-meta">Posted on <?php the_time('M j, Y'); ?> <br>by <?php the_author(); ?></p>
                                            <?php if ( has_category() ) : ?>
                                                <p class="post-categories">Categories: <?php the_category( ', ' ); ?></p>   
                                            <?php endif; ?>
                                            <?php if ( has_tag() ) : ?>
                                                <p class="post-tags">Tags: <?php the_tags( '', ', ' ); ?></p>   
                                            <?php endif; ?>
                                            <p class="post-comments"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></p>
                                        </div>
                                        <div class="entry-summary">
                                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                        </div>
                                        <div class="read-more">
                                            <a class="read-more-btn" href="<?php the_permalink(); ?>">Read&nbsp;the full post <span class="sr-only"><?php the_title(); ?></span><span class="arrow">&rArr;</span></a>
                                        </div>
                                    </article>