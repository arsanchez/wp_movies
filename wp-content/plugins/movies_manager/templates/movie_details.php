<?php 
$poster = ($movie->poster_path != null) ?  'https://image.tmdb.org/t/p/w500/' . $movie->poster_path : "https://via.placeholder.com/500";

$genres = implode(', ', array_map(function ($g) {
    return $g->name;
}, $movie->genres));

$production_companies = implode(', ', array_map(function ($c) {
    return ($c->name);
}, $movie->production_companies));

$cast = $client->get_movie_cast($movie->id);

?>
<section class="elementor-section elementor-top-section elementor-element elementor-element-41ad8f74 elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="41ad8f74" data-element_type="section">
   <div class="elementor-container elementor-column-gap-no">
      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6f72bba6" data-id="6f72bba6" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-8a5822f elementor-widget elementor-widget-heading" data-id="8a5822f" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h1 class="elementor-heading-title elementor-size-default"><?php echo $movie->title; ?></h1>
               </div>
            </div>
            <div class="elementor-element elementor-element-67d8fea1 elementor-widget elementor-widget-text-editor" data-id="67d8fea1" data-element_type="widget" data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#818a91;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#818a91;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}
                  </style>
                  <p><b>Movie Genre: </b> <?php echo $genres; ?></p>
                  <p><b>Alternative titles: </b> <?php echo $alternative_titles; ?></p>
                  <p><b>Overview: </b> <?php echo $movie->overview; ?></p>
                  <p><b>Production companies: </b> <?php echo $production_companies; ?></p>
                  <p><b>Release date: </b> <?php echo $movie->release_date; ?></p>
                  <p><b>Original language: </b> <?php echo $movie->original_language; ?></p>
                  <p><b>Popularity: </b> <?php echo $movie->popularity; ?></p>
               </div>
            </div>

            <?php if ($trailer): ?>
            <div class="elementor-element elementor-element-8a6dfea elementor-align-left elementor-mobile-align-center elementor-widget elementor-widget-button animated fadeInDown" data-id="8a6dfea" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="button.default">
               <div class="elementor-widget-container">
                  <div class="elementor-button-wrapper">
                     <a href="<?php echo $trailer; ?>" target="blank" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                     <span class="elementor-button-content-wrapper">
                     <span class="elementor-button-text">View trailer</span>
                     </span>
                     </a>
                  </div>
               </div>
            </div>
            <?php endif; ?>

         </div>
      </div>
      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-54b3ac66" data-id="54b3ac66" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-5d7ecf89 elementor-widget elementor-widget-image" data-id="5d7ecf89" data-element_type="widget" data-widget_type="image.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}
                  </style>
                  <img width="843" height="425" src="<?php echo $poster; ?>" class="attachment-large size-large" alt="" >															
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Cast  -->
<section class="elementor-section elementor-top-section elementor-element elementor-element-cb74a97 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="cb74a97" data-element_type="section">
   <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b01b13" data-id="5b01b13" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-69403df elementor-widget elementor-widget-heading" data-id="69403df" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}
                  </style>
                  <h2 class="elementor-heading-title elementor-size-default">Cast</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php 
   wpmmanager_render_actors($cast);
?>

<!-- Related movies -->
<section class="elementor-section elementor-top-section elementor-element elementor-element-33a13822 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default" data-id="33a13822" data-element_type="section">
   <div class="elementor-container elementor-column-gap-no">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-640dd99b" data-id="640dd99b" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-31547474 elementor-widget elementor-widget-heading" data-id="31547474" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default">Reviews</h2>
               </div>
            </div>
            <section class="elementor-section elementor-inner-section elementor-element elementor-element-3f7739e2 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3f7739e2" data-element_type="section">
               <?php foreach($reviews as $author => $review): ?>
               <div class="elementor-container elementor-column-gap-custom">
                  <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-48abc865" data-id="48abc865" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-13d95a6 elementor-view-stacked elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="13d95a6" data-element_type="widget" data-widget_type="icon-box.default">
                           <div class="elementor-widget-container">
                              <link rel="stylesheet" href="http://localhost/movies/wp-content/plugins/elementor/assets/css/widget-icon-box.min.css">
                              <div class="elementor-icon-box-wrapper">
                                 <div class="elementor-icon-box-content">
                                    <h4 class="elementor-icon-box-title">
                                       <span><?php echo $author; ?></span>
                                    </h4>
                                    <p class="elementor-icon-box-description">
                                        <?php echo $review; ?>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <?php endforeach;?>
            </section>
         </div>
      </div>
   </div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-33a13822 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default" data-id="33a13822" data-element_type="section">
   <div class="elementor-container elementor-column-gap-no">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-640dd99b" data-id="640dd99b" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-31547474 elementor-widget elementor-widget-heading" data-id="31547474" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h2 class="elementor-heading-title elementor-size-default">Similar movies</h2>
               </div>
            </div>
            <section class="elementor-section elementor-inner-section elementor-element elementor-element-3f7739e2 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3f7739e2" data-element_type="section">
               <div class="elementor-container elementor-column-gap-custom">
               <?php foreach($similar_movies as $movie): ?>   
               <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-48abc865" data-id="48abc865" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-13d95a6 elementor-view-stacked elementor-vertical-align-top elementor-widget elementor-widget-icon-box" data-id="13d95a6" data-element_type="widget" data-widget_type="icon-box.default">
                           <div class="elementor-widget-container">
                              <link rel="stylesheet" href="http://localhost/movies/wp-content/plugins/elementor/assets/css/widget-icon-box.min.css">
                              <div class="elementor-icon-box-wrapper">
                                 <div class="elementor-icon-box-content">
                                    <h4 class="elementor-icon-box-title">
                                       <span><?php echo $movie->title; ?> </span>
                                    </h4>
                                    <p class="elementor-icon-box-description">
                                        <?php echo $movie->overview; ?>			
                                        <hr>	
                                        <a href = "<?php echo get_site_url(null, "/movie-details/?movie=" . $movie->id); ?>">View more</a> 
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                <?php endforeach;?>
                </section>
         </div>
      </div>
   </div>
</section>