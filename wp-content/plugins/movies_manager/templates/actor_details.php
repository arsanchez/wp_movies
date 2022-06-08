<?php 
$profile = ($actor->profile_path != null) ?  'https://image.tmdb.org/t/p/w500/' . $actor->profile_path : "https://via.placeholder.com/500";
$gallery_count = (count($actor_gallery)) < 10 ? count($actor_gallery) : 10;
$movies  = $client->get_actor_movies($actor->id);

?>
<section class="elementor-section elementor-top-section elementor-element elementor-element-41ad8f74 elementor-section-content-middle elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="41ad8f74" data-element_type="section">
   <div class="elementor-container elementor-column-gap-no">
      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6f72bba6" data-id="6f72bba6" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-8a5822f elementor-widget elementor-widget-heading" data-id="8a5822f" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <h1 class="elementor-heading-title elementor-size-default"><?php echo $actor->name; ?></h1>
               </div>
            </div>
            <div class="elementor-element elementor-element-67d8fea1 elementor-widget elementor-widget-text-editor" data-id="67d8fea1" data-element_type="widget" data-widget_type="text-editor.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#818a91;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#818a91;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}
                  </style>
                  <p><b>Birthday: </b> <?php echo $actor->birthday; ?></p>
                  <p><b>Place of birth: </b> <?php echo $actor->place_of_birth; ?></p>
                  
                  <!-- Day of death if applicable -->
                  <p><b>Death: </b> <?php echo ($actor->deathday !== null) ? $actor->deathday : 'N/A'; ?></p>
                    
                  <!-- Website if applicable -->
                  <p><b>Website: </b> <?php echo ($actor->homepage !== null) ? $actor->homepage : 'N/A'; ?></p>
                  <p><b>Popularity: </b> <?php echo $actor->popularity; ?></p>
                  <p><b>Biography: </b> <?php echo $actor->biography; ?></p>
                  
               </div>
            </div>
         </div>
      </div>
      <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-54b3ac66" data-id="54b3ac66" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-5d7ecf89 elementor-widget elementor-widget-image" data-id="5d7ecf89" data-element_type="widget" data-widget_type="image.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}
                  </style>
                  <img width="843" height="425" src="<?php echo $profile; ?>" class="attachment-large size-large" alt="" >															
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Gallery -->
<section class="elementor-section elementor-top-section elementor-element elementor-element-cb74a97 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="cb74a97" data-element_type="section">
   <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b01b13" data-id="5b01b13" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-69403df elementor-widget elementor-widget-heading" data-id="69403df" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}
                  </style>
                  <h2 class="elementor-heading-title elementor-size-default">Image gallery</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="elementor-section elementor-top-section elementor-element elementor-element-1a4ca93 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1a4ca93" data-element_type="section">
   <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5757ef4" data-id="5757ef4" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-a55fe7d elementor-widget elementor-widget-image-gallery" data-id="a55fe7d" data-element_type="widget" data-widget_type="image-gallery.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-image-gallery .gallery-item{display:inline-block;text-align:center;vertical-align:top;width:100%;max-width:100%;margin:0 auto}.elementor-image-gallery .gallery-item img{margin:0 auto}.elementor-image-gallery .gallery-item .gallery-caption{margin:0}.elementor-image-gallery figure img{display:block}.elementor-image-gallery figure figcaption{width:100%}.gallery-spacing-custom .elementor-image-gallery .gallery-icon{padding:0}@media (min-width:768px){.elementor-image-gallery .gallery-columns-2 .gallery-item{max-width:50%}.elementor-image-gallery .gallery-columns-3 .gallery-item{max-width:33.33%}.elementor-image-gallery .gallery-columns-4 .gallery-item{max-width:25%}.elementor-image-gallery .gallery-columns-5 .gallery-item{max-width:20%}.elementor-image-gallery .gallery-columns-6 .gallery-item{max-width:16.666%}.elementor-image-gallery .gallery-columns-7 .gallery-item{max-width:14.28%}.elementor-image-gallery .gallery-columns-8 .gallery-item{max-width:12.5%}.elementor-image-gallery .gallery-columns-9 .gallery-item{max-width:11.11%}.elementor-image-gallery .gallery-columns-10 .gallery-item{max-width:10%}}@media (min-width:480px) and (max-width:767px){.elementor-image-gallery .gallery.gallery-columns-2 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-3 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-4 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-5 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-6 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-7 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-8 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-9 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-10 .gallery-item{max-width:50%}}@media (max-width:479px){.elementor-image-gallery .gallery.gallery-columns-2 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-3 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-4 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-5 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-6 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-7 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-8 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-9 .gallery-item,.elementor-image-gallery .gallery.gallery-columns-10 .gallery-item{max-width:100%}}
                  </style>
                  <div class="elementor-image-gallery">
                     <div id="gallery-1" class="gallery galleryid-128 gallery-columns-4 gallery-size-thumbnail">
                        <?php for ($i = 0; $i < $gallery_count; $i++): $g = $actor_gallery[$i];  $path = 'https://image.tmdb.org/t/p/w500/' . $g->file_path; ?>
                        <figure class="gallery-item">
                           <div class="gallery-icon landscape">
                              <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a55fe7d" 
                              data-elementor-lightbox-title="Image-Contact-1.jpg" >
                              <img width="150" height="150" src="<?php echo $path; ?>" class="attachment-thumbnail size-thumbnail" alt="" loading="lazy"></a>
                           </div>
                        </figure>
                        <?php endfor; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- Related movies -->
<section class="elementor-section elementor-top-section elementor-element elementor-element-cb74a97 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="cb74a97" data-element_type="section">
   <div class="elementor-container elementor-column-gap-default">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b01b13" data-id="5b01b13" data-element_type="column">
         <div class="elementor-widget-wrap elementor-element-populated">
            <div class="elementor-element elementor-element-69403df elementor-widget elementor-widget-heading" data-id="69403df" data-element_type="widget" data-widget_type="heading.default">
               <div class="elementor-widget-container">
                  <style>/*! elementor - v3.6.5 - 27-04-2022 */
                     .elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}
                  </style>
                  <h2 class="elementor-heading-title elementor-size-default">Related movies</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php 
  wpmmanager_render_movies($movies,$client,10, 3);
?>

