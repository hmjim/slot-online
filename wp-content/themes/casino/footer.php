<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package casino
 */

?>
<div id="mobile_sitebar" style="display: none;"></div>

 <div class="c1_foter_all">
     <div class="c1_foter">
        <div class="c1_foter_link">
        
        
<?php
	   wp_nav_menu( array(
        	'menu_class'=>'menu',
            'theme_location'=>'bottom',
            'after'=>'<span>&bull;</span>'
        ) );
?>

        </div>
        <div class="c1_sk_iiu">
           
        </div>
                <div class="c1_foter_text">© 2020 Slot-Onlinus
</div>
     </div>
 </div>



<script>
    var wight = window.innerWidth;
    
    if(wight < 1024){
        $('#c1_menu-verhnee-menyu li a').click(function(){

            sub = $(this).parents('li').attr('class').split(' ');

            if(sub['0'] === 'ssub') {
                event.preventDefault();
            }
            
            
        });
    }
    
    //alert(window.innerWidth);
    
    $('ul.c1_sub-menu').before('<div class="c1_dj"></div>');

</script>

<?php wp_footer(); ?>



<script>
/* Переносим сайдбар */
function innermobile(){
if ($( document ).width() <= 1000) {
var innermobile = $(".c1_sitebar").html();
$("#mobile_sitebar").html(innermobile);
}}
innermobile();
var resizeTimer;
$(window).on('resize', function(e) {
clearTimeout(resizeTimer);
resizeTimer = setTimeout(function() {innermobile();}, 250);
});
</script>



</body>
</html>
