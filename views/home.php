<?php
/**
 * @var \app\models\Post[] $posts
 */
foreach ($posts as $key => $post): ?>
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
                <?php echo $post->title ?>
            </h2>
            <h3 class="post-subtitle">
                <?php echo substr($post->body, 0, 200) . (strlen($post->body) > 200 ? '...' : ''); ?>
            </h3>
        </a>
        <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on <?php echo $post->created_at ?></p>
    </div>
    <hr>
<?php endforeach; ?>



<!-- Pager -->
<div class="clearfix">
    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
</div>