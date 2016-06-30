

</main>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js">\x3C/script>')</script>
<script src="js/jquery.mixitup.min.js"></script>
<script>
$(function(){
<?php if (!$keepLinks) echo' $("header nav a").removeAttr("href");'; ?>

  $("nav .moreFiltersLink").on('click',function(){$("header").toggleClass('moreFilters')});
   var load = (window.location.hash!='') ? {filter:window.location.hash.replace('#', '.')} : '';

   $('#plats').mixItUp({
     load:load,
    	callbacks: {
    		onMixEnd: function(state){
    			var hashz = state.activeFilter.replace('.','#')
          window.location.hash = hashz;
    		}
    	}
    });
   /*
   $('#plats').mixItUp(<?php if($_GET['cat'] && in_array($_GET['cat'],$allCategories)){
     echo "
      {
        load: {
          filter: '.".$_GET['cat']."'
        }
      }";
   }
   ?>);
   */
});
</script>
</body>
</html>
