<footer>
    <div id="footer">
        <div class="col-sm-3" style="float:right">
            <div class="single">
                <h2>Subscribe to our Newsletter</h2>
            <div class="input-group">
                <input type="email" class="form-control" id="email_newsletter" name="email" placeholder="Enter your email">
                <span class="input-group-btn">
                <button class="btn btn-theme" type="submit" id="store_newsletter" >Subscribe</button>
                </span>
            </div>
            <p id="response_newsletter">  </p>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="fh5co-social-icons">
                        <a href="#"><i class="icon-twitter2"></i></a>
                        <a href="#"><i class="icon-facebook2"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                        <a href="#"><i class="icon-dribbble2"></i></a>
                        <a href="#"><i class="icon-youtube"></i></a>
                    </p>
                    <p>Copyright 2020 <a href="#">Listing</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
$(document).ready(function(){
    $("#store_newsletter").click(function(e){
      e.preventDefault();

      url = "{{route('api-store-news')}}";
      console.log(url);
      emailNewsletter = $("#email_newsletter").val();

      /*$.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {
          email:emailNewsletter
        },
        success: function(result){

            $("#response_newsletter").text("you have successfully subscribed");
            $("#email").val('');
        },
        error: function(xhr, status, errors) {
          var err = JSON.parse(xhr.responseText);
          alert(err.errors);
        }
      });*/

    });
});

</script>
