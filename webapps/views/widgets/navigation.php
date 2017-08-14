<?php foreach ($items as $item) : ?>
<li class="<?php echo selected($item->url) ?>">
    <a href="<?php echo (is_parent($item->id) > 0) ? "#".strtolower($item->label) : site_url($item->url); ?>">
        <i class="material-icons"><?php echo $item->attributes ?></i>
        <p><?php echo $item->label ?>
            <?php if(is_parent($item->id) > 0) echo '<b class="caret"></b>';  ?>
        </p>
    </a>
    <?php if(is_parent($item->id) > 0) { ?>
        <div class="collapse" id="<?php echo strtolower($item->label) ?>">
            <ul class="nav">
                <?php foreach (get_child($item->id) as $child): ?>
                <li>
                    <a href="<?php echo site_url($child->url) ?>"><?php echo $child->label; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php } ?>
</li>
<?php endforeach; ?>
