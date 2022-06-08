<div class='pagination-container' >
    <nav>
        <ul class="movies-pagination">
            <?php $disabled_prev = ($current_page == 1); ?>
            <li class = "<?php echo $disabled_prev ? 'disabled' : ''; ?>"  data-page="prev" >
                <span> < </span>
            </li>
            <?php
                if ($current_page >= 9) {
                    // Always printing the first page 
                    echo '<li data-page="1" id=""><span>1...</span></li>';

                    $min = $current_page - 5;
                    $max =  ($current_page + 5 > $pages) ? $pages : $current_page + 10;
                } else {
                    $min = 1;
                    $max = (10 > $pages) ? $pages : 10;
                }
                
                for ($i = $min; $i <= $max; $i ++) {
                    $disabled = ($current_page == $i) ? 'disabled' : ''; 
                    echo '<li class = "' . $disabled . '" data-page="' . $i . '" id="prev"><span>' . $i . '</span></li>';
                }
            ?>  
            <?php $disabled_prev = ($current_page == $pages); ?>
            <li class = "<?php echo $disabled_prev ? 'disabled' : ''; ?>"  data-page="next" id="prev">
                <span> > </span>
            </li>
            </ul>
        </nav>
    </div>
</div>