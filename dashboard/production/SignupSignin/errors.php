<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>


  <!--Google API Google Client ID -->
  <meta name="google-signin-client_id" content="719944339176-3noalf2uoj8cjukfcck8u85nfjs0bvj8.apps.googleusercontent.com">
<!--Google API Google Platform Library -->
<script src="https://apis.google.com/js/platform.js" async defer></script>