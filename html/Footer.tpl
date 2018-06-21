
<hr>
<footer class="container-fluid text-center">
<p>
            Made by <a class="copy" href="#" target="_blank">FX Finder</a></p>
</p>
</footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.9.1.min.js"   type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript" ></script>
  

    <script src="js/jquery-1.9.1.min.js"   type="text/javascript"></script>

        <script src="js/jquery-ui-1.11.4.min.js"   type="text/javascript"></script>

        <script src="js/jquery.validate.min.js"   type="text/javascript"></script>


        <script src="js/jquery.validate.unobtrusive.js"   type="text/javascript"></script>

         <script type="text/javascript" src="js/moment-with-locales.js" charset="UTF-8"></script>

           <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>



           

{literal}
    

<script>



$( document ).ready(function() {
$('.date').each(function(){
	
	var date = new Date();
	var newdate = new Date(date);
	var newdate1=newdate.setDate(newdate.getDate()-365);

  $(this).datetimepicker({ locale: 'en-gb', format: 'L',maxDate: new Date(), minDate:new Date(newdate1)});

});
});


</script>
{/literal}

</body>
</html>


